<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoSalidaModel;

class AdminTipoSalida extends BaseController
{
	
	public function index()
	{

		//Muestra la primera vista del administrador en este caso el admin de Tipos de dificultad
		$TipoSalidaModel= new TipoSalidaModel();
		$TipoSalidaModel=$TipoSalidaModel->findAll();
		$TipoSalidaModel=array('TipoSalidaModel'=>$TipoSalidaModel);
		$estructura=view('head').view('header').view('index').view('adminTipoSalida',$TipoSalidaModel);
		return $estructura;
	}
	//-------------------------------------------------------------------

	//Muestra el formulario para ingresar un nuevo tipo de dificultad
	public function mostrarFormulario(){
		$estructura=view('head').view('header').view('index').view('nuevoTipoSalida');
		return $estructura;

	}

	//Insertar el nuevo tipo de dificultad
	public function insertar(){

		$TipoSalidaModel= new TipoSalidaModel();
        $request=\Config\Services::request();
        //recibe la informacion traida del formulario
		$data = array(
			'nombreTipoSalida'    => $request->getPostGet('nombreTipoSalida'),
        );
        //Inserta en la base de datos
		if($TipoSalidaModel->insert($data)===false)	{
			echo "Error";
		}
		else{
            //devuelve la vista de la tabla
			$TipoSalidaModel= new TipoSalidaModel();
            $TipoSalidaModel=$TipoSalidaModel->findAll();
            $TipoSalidaModel=array('TipoSalidaModel'=>$TipoSalidaModel);
            $estructura=view('head').view('header').view('index').view('adminTipoSalida',$TipoSalidaModel);
            return $estructura;
		}

	}

	public function eliminar(){
		$TipoSalidaModel= new TipoSalidaModel();
		$request=\Config\Services::request();
		$idTipoSalida=$request->getPostGet('idTipoSalida');
		$TipoSalidaModel->delete($idTipoSalida);
		$TipoSalidaModel=$TipoSalidaModel->findAll();
		$TipoSalidaModel=array('TipoSalidaModel'=>$TipoSalidaModel);		
		$estructura=view('head').view('header').view('index').view('adminTipoSalida',$TipoSalidaModel);
		return $estructura;
		
	}

}