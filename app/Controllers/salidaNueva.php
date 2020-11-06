<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SalidasModel;
use App\Models\TipoSalidaModel;
use App\Models\TipoDificultadModel;

class salidaNueva extends BaseController
{
	//Muestra el formulario para ingresar una nueva salida
	public function index()
	{	
		//Trae la informacion de los tipos de salida que se encuentran registrados
		$TiposalidasModel= new TipoSalidaModel();
		//Buscador tipo Salida
		$tiposSalida= $TiposalidasModel->findColumn('nombreTipoSalida');
		$tiposSalida= array('tiposSalida'=>$tiposSalida);

		//Trae la informacion de los tipos de dificultad que se encuentran registrados
		$TipoDificultadModel= new TipoDificultadModel();
		//Buscador tipo Salida
		$tiposDificultad= $TipoDificultadModel->findColumn('nombreTipoDificultad');
		$tiposDificultad= array('tiposDificultad'=>$tiposDificultad);

		$datos['tiposSalida']=$tiposSalida;
		$datos['tiposDificultad']=$tiposDificultad;
		$estructura=view('head').view('header').view('index').view('nuevaSalida',$datos);
		return $estructura;
	}

	//Inserta o edita una salida
	
	public function insertar(){

		//Guarda la imagen en una carpeta	
		$target_dir = "./public/img/salida/"; //directorio en el que se subira
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//se añade el directorio y el nombre del archivo
		$uploadOk = 1;//se añade un valor determinado en 1
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Comprueba si el archivo de imagen es una imagen real o una imagen falsa
		if(isset($_POST["submit"])) {//detecta el boton
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {//si es falso es una imagen y si no lanza error
				echo "Archivo es una imagen- " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "El archivo no es una imagen";
				$uploadOk = 0;
			}
		}
		// Comprobar si el archivo ya existe
		if (file_exists($target_file)) {
			echo "El archivo ya existe";
			$uploadOk = 0;//si existe lanza un valor en 0
		}
		// Comprueba el peso
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			echo "Perdon pero el archivo es muy pesado";
			$uploadOk = 0;
		}
		// Permitir ciertos formatos de archivo
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Perdon solo, JPG, JPEG, PNG & GIF Estan soportados";
			$uploadOk = 0;
		}
		//Comprueba si $ uploadOk se establece en 0 por un error
		if ($uploadOk == 0) {
			echo "Perdon, pero el archivo no se subio";
		// si todo está bien, intenta subir el archivo
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

				// Si la imagen a subir cumple con todos los requisitos se ingresa el resto de informacion a la base de datos
				//Recibe el tipo de salida para ingresar a la base de datos
				$request=\Config\Services::request();
				$tipoSalida=$request->getPostGet('tipoSalida');
				//como llega en arreglo, se convierte el valor en un numero para buscar en la base de datos, se suma 1 porque el arreglo comienza en 0 y los id desde 1
				$tSalida=intval($tipoSalida);
				$tSalida=$tSalida+1;

				//Recibe el tipo de dificultad para ingresar a la base de datos
				$tipoDificultad=$request->getPostGet('tiposDificultad');
				//como llega en arreglo, se convierte el valor en un numero para buscar en la base de datos, se suma 1 porque el arreglo comienza en 0 y los id desde 1
				$tDificultad=intval($tipoDificultad);
				$tDificultad=$tDificultad+1;

				//Recibo el nombre de la imagen y la guardo en una variable
				$foto = $_FILES["fileToUpload"]["name"];

				$salidasModel= new SalidasModel();
				$request=\Config\Services::request();
				$data = array(
					'idClasificacion'=> $request->getPostGet('idClasificacion'),
					'nombreSalida'    => $request->getPostGet('nombreSalida'),
					'desSalida'    =>  $request->getPostGet('desSalida'),
					'fotoSalida'	=> $foto,
					'dirMapa'    =>  $request->getPostGet('dirMapa'),
					'incluyeSalida'    => $request->getPostGet('incluyeSalida'),
					'noIncluyeSalida'    =>  $request->getPostGet('noIncluyeSalida'),
					'tipoSalida'    =>  $tSalida,
					'tipoDificultad' =>$tDificultad
				);
				if($request->getPostGet('idSalida')){
					$data['idSalida']=$request->getPostGet('idSalida');
				}
				if($salidasModel->insert($data)===false)	{
					echo "Error";
				}
				else{
					$salidas=$salidasModel->findAll();
					$salidas=array('salidas'=>$salidas);
					$estructura=view('head').view('header').view('index').view('adminSalidas',$salidas);
					return $estructura;
				}

			} else {
				echo "Error al cargar el archivo";
			}
		}		
	}

	//Muestra el formulario para editar una salida con la informacion introducida anteriormente

	public function formEditar(){
		
		//Trae la informacion de los tipos de salida que se encuentran registrados
		$TiposalidasModel= new TipoSalidaModel();
		//Buscador tipo Salida
		$tiposSalida= $TiposalidasModel->findColumn('nombreTipoSalida');
		$tiposSalida= array('tiposSalida'=>$tiposSalida);

		//Trae la informacion de los tipos de dificultad que se encuentran registrados
		$TipoDificultadModel= new TipoDificultadModel();
		//Buscador tipo Salida
		$tiposDificultad= $TipoDificultadModel->findColumn('nombreTipoDificultad');
		$tiposDificultad= array('tiposDificultad'=>$tiposDificultad);

		//busco la informacion ingresada anteriormente
		$salidasModel= new SalidasModel();
		$request=\Config\Services::request();
		$idSalida=$request->getPostGet('idSalida');
		$salidas=$salidasModel->find([$idSalida]);
		$salidas=array('salidas'=>$salidas);

		//integro las dos busquedas en un solo arreglo
		$datos['tiposSalida']=$tiposSalida;
		$datos['tiposDificultad']=$tiposDificultad;
		$datos['salidas']=$salidas;

		$estructura=view('head').view('header').view('index').view('editarSalida',$datos);
		return $estructura;
		
	}
	//Edita la informacion de una salida
	public function editar(){
		
		//Si no se modifica la imagen sino solo el texto recibe la informacion y la ingresa en la base de datos
		$nombre = $_FILES["fileToUpload"]["name"];
		if($nombre==NULL){
		
				//Recibe el tipo de salida para ingresar a la base de datos
				$request=\Config\Services::request();
				$tipoSalida=$request->getPostGet('tipoSalida');
				//como llega en arreglo, se convierte el valor en un numero para buscar en la base de datos, se suma 1 porque el arreglo comienza en 0 y los id desde 1
				$tSalida=intval($tipoSalida);
				$tSalida=$tSalida+1;

				//Recibe el tipo de dificultad para ingresar a la base de datos
				$tipoDificultad=$request->getPostGet('tiposDificultad');
				//como llega en arreglo, se convierte el valor en un numero para buscar en la base de datos, se suma 1 porque el arreglo comienza en 0 y los id desde 1
				$tDificultad=intval($tipoDificultad);
				$tDificultad=$tDificultad+1;

				$salidasModel= new SalidasModel();
				$request=\Config\Services::request();
				$data = array(
					'idClasificacion'=> $request->getPostGet('idClasificacion'),
					'nombreSalida'    => $request->getPostGet('nombreSalida'),
					'desSalida'    =>  $request->getPostGet('desSalida'),
					'dirMapa'    =>  $request->getPostGet('dirMapa'),
					'incluyeSalida'    => $request->getPostGet('incluyeSalida'),
					'noIncluyeSalida'    =>  $request->getPostGet('noIncluyeSalida'),
					'tipoSalida'    =>  $tSalida,
					'tipoDificultad' =>$tDificultad
				);
				if($request->getPostGet('idSalida')){
					$data['idSalida']=$request->getPostGet('idSalida');
				}
				if($salidasModel->save($data)===false)	{
					echo "Error";
				}
				else{
					$salidas=$salidasModel->findAll();
					$salidas=array('salidas'=>$salidas);
					$estructura=view('head').view('header').view('index').view('adminSalidas',$salidas);
					return $estructura;
				}
			}

			//Si tambien se modifica la imagen ingresada anteriormente
			else{

					//Guarda la imagen en una carpeta	
					$target_dir = "./public/img/salida/"; //directorio en el que se subira
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//se añade el directorio y el nombre del archivo
					$uploadOk = 1;//se añade un valor determinado en 1
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					// Comprueba si el archivo de imagen es una imagen real o una imagen falsa
					if(isset($_POST["submit"])) {//detecta el boton
						$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
						if($check !== false) {//si es falso es una imagen y si no lanza error
							echo "Archivo es una imagen- " . $check["mime"] . ".";
							$uploadOk = 1;
						} else {
							echo "El archivo no es una imagen";
							$uploadOk = 0;
						}
					}
					// Comprobar si el archivo ya existe
					if (file_exists($target_file)) {
						echo "El archivo ya existe";
						$uploadOk = 0;//si existe lanza un valor en 0
					}
					// Comprueba el peso
					if ($_FILES["fileToUpload"]["size"] > 5000000) {
						echo "Perdon pero el archivo es muy pesado";
						$uploadOk = 0;
					}
					// Permitir ciertos formatos de archivo
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						echo "Perdon solo, JPG, JPEG, PNG & GIF Estan soportados";
						$uploadOk = 0;
					}
					//Comprueba si $ uploadOk se establece en 0 por un error
					if ($uploadOk == 0) {
						echo "Perdon, pero el archivo no se subio";
					// si todo está bien, intenta subir el archivo
					} else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

							// Si la imagen a subir cumple con todos los requisitos se ingresa el resto de informacion a la base de datos
							//Recibe el tipo de salida para ingresar a la base de datos
							$request=\Config\Services::request();
							$tipoSalida=$request->getPostGet('tipoSalida');
							//como llega en arreglo, se convierte el valor en un numero para buscar en la base de datos, se suma 1 porque el arreglo comienza en 0 y los id desde 1
							$tSalida=intval($tipoSalida);
							$tSalida=$tSalida+1;

							//Recibe el tipo de dificultad para ingresar a la base de datos
							$tipoDificultad=$request->getPostGet('tiposDificultad');
							//como llega en arreglo, se convierte el valor en un numero para buscar en la base de datos, se suma 1 porque el arreglo comienza en 0 y los id desde 1
							$tDificultad=intval($tipoDificultad);
							$tDificultad=$tDificultad+1;

							//Recibo el nombre de la imagen y la guardo en una variable
							$foto = $_FILES["fileToUpload"]["name"];
							//Le agrego el complemento de la direccion
							$direccion="/public/img/salida/".$foto;
							//Uno la direccion final para ingresar a la base de datos
							

							$salidasModel= new SalidasModel();
							$request=\Config\Services::request();
							$data = array(
								'idClasificacion'=> $request->getPostGet('idClasificacion'),
								'nombreSalida'    => $request->getPostGet('nombreSalida'),
								'desSalida'    =>  $request->getPostGet('desSalida'),
								'fotoSalida'	=> $direccion,
								'dirMapa'    =>  $request->getPostGet('dirMapa'),
								'incluyeSalida'    => $request->getPostGet('incluyeSalida'),
								'noIncluyeSalida'    =>  $request->getPostGet('noIncluyeSalida'),
								'tipoSalida'    =>  $tSalida,
								'tipoDificultad' =>$tDificultad
							);
							if($request->getPostGet('idSalida')){
								$data['idSalida']=$request->getPostGet('idSalida');
							}
							if($salidasModel->save($data)===false)	{
								echo "Error";
							}
							else{
								$salidas=$salidasModel->findAll();
								$salidas=array('salidas'=>$salidas);
								$estructura=view('head').view('header').view('index').view('adminSalidas',$salidas);
								return $estructura;
							}

						} else {
							echo "Error al cargar el archivo";
						}
					}		



			}

	}

	//Elimina una salida

	public function eliminar(){
		$salidasModel= new SalidasModel();
		$request=\Config\Services::request();
		$idSalida=$request->getPostGet('idSalida');
		$salidasModel->delete($idSalida);
		$salidas=$salidasModel->findAll();
		$salidas=array('salidas'=>$salidas);
		$estructura=view('head').view('header').view('index').view('adminSalidas',$salidas);
		return $estructura;
		
	}

    
}