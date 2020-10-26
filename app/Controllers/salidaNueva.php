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

	//Muestra el formulario para editar una salida con la informacion introducida anteriormente

	public function editar(){
		
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