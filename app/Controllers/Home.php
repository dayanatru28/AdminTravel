<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SalidasModel;

class Home extends BaseController
{
	
	public function index()
	{

		//Muestra la primera vista del administrador en este caso el admin de salidas
		$salidasModel= new SalidasModel();
		$salidas=$salidasModel->findAll();
		$salidas=array('salidas'=>$salidas);
		$estructura=view('head').view('header').view('index').view('adminSalidas',$salidas);
		return $estructura;
	}
    //-------------------------------------------------------------------

}
