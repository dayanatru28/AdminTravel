<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoDificultadModel;

class AdminTipoDificultad extends BaseController
{
	
	public function index()
	{

		//Muestra la primera vista del administrador en este caso el admin de Tipos de dificultad
		$TipoDificultadModel= new TipoDificultadModel();
		$TipoDificultadModel=$TipoDificultadModel->findAll();
		$TipoDificultadModel=array('TipoDificultadModel'=>$TipoDificultadModel);
		$estructura=view('head').view('header').view('index').view('adminTipoDificultad',$TipoDificultadModel);
		return $estructura;
	}
	//-------------------------------------------------------------------

	//Muestra el formulario para ingresar un nuevo tipo de dificultad
	public function mostrarFormulario(){
		$estructura=view('head').view('header').view('index').view('nuevoTipoDificultad');
		return $estructura;

	}

	//Insertar el nuevo tipo de dificultad
	public function insertar(){

		$TipoDificultadModel= new TipoDificultadModel();
		$request=\Config\Services::request();
		
		$data = array(
			'nombreTipoDificultad'    => $request->getPostGet('nombreTipoDificultad'),
		);

		if($TipoDificultadModel->insert($data)===false)	{
			echo "Error";
		}
		else{
			$TipoDificultadModel= new TipoDificultadModel();
			$TipoDificultadModel=$TipoDificultadModel->findAll();
			$TipoDificultadModel=array('TipoDificultadModel'=>$TipoDificultadModel);
			$estructura=view('head').view('header').view('index').view('adminTipoDificultad',$TipoDificultadModel);
			return $estructura;
		}

	}



	public function eliminar(){
		$TipoDificultadModel= new TipoDificultadModel();
		$request=\Config\Services::request();
		$idDificultad=$request->getPostGet('idTipoDificultad');
		$TipoDificultadModel->delete($idDificultad);
		$TipoDificultadModel=$TipoDificultadModel->findAll();
		$TipoDificultadModel=array('TipoDificultadModel'=>$TipoDificultadModel);		
		$estructura=view('head').view('header').view('index').view('adminTipoDificultad',$TipoDificultadModel);
		return $estructura;
		
	}

}
