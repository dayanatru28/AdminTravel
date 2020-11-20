<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SalidasModel;
use App\Models\TipoPlanModel;
use App\Models\BuscadorModel;

class AdminBuscador extends BaseController
{
    //Muestra la informacion de la base de datos y la tabla del buscador para las clasificacion de las act. deportivas
    public function index()
	{
		$BuscadorModel= new BuscadorModel();
		$BuscadorModel=$BuscadorModel->findAll();
		$BuscadorModel=array('BuscadorModel'=>$BuscadorModel);		
		$estructura=view('head').view('header').view('index').view('adminBuscador',$BuscadorModel);
		return $estructura;
    }

    //Muestra el formulario para ingresar una nueva actividad deportiva a una salida en especial
	public function mostrarFormulario(){
        //Busco todas las salidas o lugares disponibles
		$salidasModel= new SalidasModel();
		$salidasModel= $salidasModel->findAll();
        $salidasModel= array('salidasModel'=>$salidasModel);
        //Busco todas las actividades deportivas disponibles
        $tipoPlanModel= new TipoPlanModel();
        $tipoPlanModel=$tipoPlanModel->findAll();
        $tipoPlanModel= array('tipoPlanModel'=>$tipoPlanModel);
        //integro las dos busquedas en un solo arreglo
		$datos['salidasModel']=$salidasModel;
        $datos['tipoPlanModel']=$tipoPlanModel;
        
		$estructura=view('head').view('header').view('index').view('nuevaBuscador',$datos);
		return $estructura;
    }
    
    //agrego la nueva actividad a la salida
    public function insertar(){
        $BuscadorModel= new BuscadorModel();
        $request=\Config\Services::request();
        //Guarda la informacion en un arreglo
        $data = array(
            'idSalida'=> $request->getPostGet('idSalida'),
            'idPlan'    => $request->getPostGet('idPlan'),
        );
        //Lo inserto en la base de datos
        if($BuscadorModel->insert($data)===false)	{
            echo "Error";
        }
        else{
            $BuscadorModel= new BuscadorModel();
            $BuscadorModel=$BuscadorModel->findAll();
            $BuscadorModel=array('BuscadorModel'=>$BuscadorModel);		
            $estructura=view('head').view('header').view('index').view('adminBuscador',$BuscadorModel);
            return $estructura;
        }
    }

    //Elimina una actividad de una salida en especial
    public function eliminar(){
        $BuscadorModel= new BuscadorModel();
        $request=\Config\Services::request();
        $idBuscador=$request->getPostGet('idBuscador');
        $BuscadorModel->delete($idBuscador);
        $BuscadorModel=$BuscadorModel->findAll();
        $BuscadorModel=array('BuscadorModel'=>$BuscadorModel);		
        $estructura=view('head').view('header').view('index').view('adminBuscador',$BuscadorModel);
        return $estructura;

    }



}