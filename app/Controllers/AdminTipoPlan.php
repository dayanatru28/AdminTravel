<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoPlanModel;

class AdminTipoPlan extends BaseController
{
	
	public function index()
	{

		//Muestra la primera vista del administrador en este caso el admin de Tipos de dificultad
		$TipoPlanModel= new TipoPlanModel();
		$TipoPlanModel=$TipoPlanModel->findAll();
		$TipoPlanModel=array('TipoPlanModel'=>$TipoPlanModel);
		$estructura=view('head').view('header').view('index').view('adminTipoPlan',$TipoPlanModel);
		return $estructura;
	}
	//-------------------------------------------------------------------

	//Muestra el formulario para ingresar un nuevo tipo de dificultad
	public function mostrarFormulario(){
		$estructura=view('head').view('header').view('index').view('nuevoTipoPlan');
		return $estructura;

	}

	//Insertar el nuevo tipo de dificultad
	public function insertar(){

		$TipoPlanModel= new TipoPlanModel();
        $request=\Config\Services::request();
        //recibe la informacion traida del formulario
		$data = array(
			'nombreTipoPlan'    => $request->getPostGet('nombreTipoPlan'),
        );
        //Inserta en la base de datos
		if($TipoPlanModel->insert($data)===false)	{
			echo "Error";
		}
		else{
            //devuelve la vista de la tabla
			$TipoPlanModel= new TipoPlanModel();
            $TipoPlanModel=$TipoPlanModel->findAll();
            $TipoPlanModel=array('TipoPlanModel'=>$TipoPlanModel);
            $estructura=view('head').view('header').view('index').view('adminTipoPlan',$TipoPlanModel);
            return $estructura;
		}

	}

	public function eliminar(){
		$TipoPlanModel= new TipoPlanModel();
		$request=\Config\Services::request();
		$idTipoPlan=$request->getPostGet('idTipoPlan');
		$TipoPlanModel->delete($idTipoPlan);
		$TipoPlanModel=$TipoPlanModel->findAll();
        $TipoPlanModel=array('TipoPlanModel'=>$TipoPlanModel);
        $estructura=view('head').view('header').view('index').view('adminTipoPlan',$TipoPlanModel);
        return $estructura;
		
	}

}