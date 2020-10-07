<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CotizacionesModel;

class AdminCotizaciones extends BaseController
{

    //Muestra la tabla con todas las cotizaciones realizadas
    public function index()
	{
		$CotizacionesModel= new CotizacionesModel();
		$CotizacionesModel=$CotizacionesModel->findAll();
		$CotizacionesModel=array('CotizacionesModel'=>$CotizacionesModel);		
		$estructura=view('head').view('header').view('index').view('adminCotizaciones',$CotizacionesModel);
		return $estructura;
    }
    
    //Permite eliminar u ocultar alguna cotizacion en especifico

	public function eliminar(){
		$CotizacionesModel= new CotizacionesModel();
		$request=\Config\Services::request();
		$idCotizacion=$request->getPostGet('idCotizacion');
		$CotizacionesModel->delete($idCotizacion);
		$CotizacionesModel=$CotizacionesModel->findAll();
		$CotizacionesModel=array('CotizacionesModel'=>$CotizacionesModel);		
		$estructura=view('head').view('header').view('index').view('adminCotizaciones',$CotizacionesModel);
		return $estructura;
		
	}

}