<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SalidasModel;
use App\Models\ImagenesModel;

class AdminImagenes extends BaseController
{
    public function index()
	{
		//Muestra las imagenes subidas 
		$imagenesModel= new ImagenesModel();
		$imagenesModel=$imagenesModel->findAll();
		$imagenesModel=array('imagenesModel'=>$imagenesModel);		
		$estructura=view('head').view('header').view('index').view('adminImagenes',$imagenesModel);
		return $estructura;
	}

	//Muestra el formulario para ingresar una nueva imagen
	public function mostrarFormulario(){

		$salidasModel= new SalidasModel();
		$salidasModel= $salidasModel->findAll();
		$salidasModel= array('salidasModel'=>$salidasModel);

		$estructura=view('head').view('header').view('index').view('nuevaImagen',$salidasModel);
		return $estructura;

	}

	//Elimina una imagen

	public function eliminar(){
		$imagenesModel= new ImagenesModel();
		$request=\Config\Services::request();
		$idFoto=$request->getPostGet('idFoto');
		$imagenesModel->delete($idFoto);
		$imagenesModel=$imagenesModel->findAll();
		$imagenesModel=array('imagenesModel'=>$imagenesModel);		
		$estructura=view('head').view('header').view('index').view('adminImagenes',$imagenesModel);
		return $estructura;
		
	}

	//Carga la imagen y la direccion de la ubicacion del archivo

	public function upload(){
			
		//Guarda la imagen en una carpeta	
		$target_dir = "./public/img/"; //directorio en el que se subira
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

				// Si el archivo se carga correctamente y se guarda en la carpeta se agrega su nombre en la base de datos
				//Inserta la direccion de la imagen y la clasificacion en la base de datos
				$imagenesModel= new ImagenesModel();
				$request=\Config\Services::request();
				$idSalida=$request->getPostGet('idSalida');
				
				//Recibo el nombre del archivo y lo ingreso en una variable
				$nombre = $_FILES["fileToUpload"]["name"];
	
				//Guarda la informacion en un arreglo
				$data = array(
					'idSalida'=> $idSalida,
					'direcFoto'    => $nombre,
				);

				//Lo inserto en la base de datos
				if($imagenesModel->insert($data)===false)	{
					echo "Error";
				}
				else{
					$imagenesModel= new ImagenesModel();
					$imagenesModel=$imagenesModel->findAll();
					$imagenesModel=array('imagenesModel'=>$imagenesModel);		
					$estructura=view('head').view('header').view('index').view('adminImagenes',$imagenesModel);
					return $estructura;
				}

			} else {
						echo "Error al cargar el archivo";
					}
		}


		
	}

}
