<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SalidasModel;
use App\Models\SitiosInteresModel;


class AdminSitiosInteres extends BaseController
{
    public function index()
	{
		//Muestra la tabla con todos los sitios ingresados anteriormente
		$SitiosInteresModel= new SitiosInteresModel();
		$SitiosInteresModel=$SitiosInteresModel->findAll();
		$SitiosInteresModel=array('SitiosInteresModel'=>$SitiosInteresModel);		
		$estructura=view('head').view('header').view('index').view('adminSitios',$SitiosInteresModel);
		return $estructura;
	}

	//Muestra el formulario para ingresar un nuevo sitio de interes
	public function mostrarFormulario(){

		$salidasModel= new SalidasModel();
		$salidasModel= $salidasModel->findAll();
		$salidasModel= array('salidasModel'=>$salidasModel);

		$estructura=view('head').view('header').view('index').view('nuevoSitio',$salidasModel);
		return $estructura;

	}

	//Inserta el nombre y la descripcion del sitio de interes nuevo

	public function insertar(){

		$request=\Config\Services::request();
        $SitiosInteresModel= new SitiosInteresModel();

		$data = array(
			'idSalida'=> $request->getPostGet('idSalida'),
            'nombreSitio'    => $request->getPostGet('nombreSitio'),
            'desSitio'    => $request->getPostGet('desSitio')
        );
       
        if($request->getPostGet('idSitio')){
			$data['idSitio']=$request->getPostGet('idSitio');
		}
        if($SitiosInteresModel->save($data)===false)	{
            echo "Error";
        }
        else{
            $SitiosInteresModel=$SitiosInteresModel->findAll();
            $SitiosInteresModel=array('SitiosInteresModel'=>$SitiosInteresModel);		
            $estructura=view('head').view('header').view('index').view('adminSitios',$SitiosInteresModel);
            return $estructura;
        }
    
    }
    
    //Carga la informacion incluida en la base de datos de cada sitio para ser editada en un formulario
    public function formEditar(){

		$salidasModel= new SalidasModel();
		//recibimos el id de la salida para realizar la busqueda del nombre en la base de datos
		$request=\Config\Services::request();
		$idSalida=$request->getPostGet('idSalida');
		$salidasModel= $salidasModel->find([$idSalida]);
		$salidasModel= array('salidasModel'=>$salidasModel);

        $SitiosInteresModel= new SitiosInteresModel();
        //Se recibe el id del sitio para cargar la informacion guardada anteriormente
		$idSitio=$request->getPostGet('idSitio');
		$SitiosInteresModel=$SitiosInteresModel->find([$idSitio]);
        $SitiosInteresModel=array('SitiosInteresModel'=>$SitiosInteresModel);

        $datos['salidasModel']=$salidasModel;
        $datos['SitiosInteresModel']=$SitiosInteresModel;
        
        $estructura=view('head').view('header').view('index').view('editarSitio',$datos);
		return $estructura;
	}

	//Editar la informacion sobre nombre y descripcion de un sitio en especial

	public function editar(){

		$request=\Config\Services::request();
        $SitiosInteresModel= new SitiosInteresModel();

		$data = array(
            'nombreSitio'    => $request->getPostGet('nombreSitio'),
            'desSitio'    => $request->getPostGet('desSitio')
        );
       
        if($request->getPostGet('idSitio')){
			$data['idSitio']=$request->getPostGet('idSitio');
		}
        if($SitiosInteresModel->save($data)===false)	{
            echo "Error";
        }
        else{
            $SitiosInteresModel=$SitiosInteresModel->findAll();
            $SitiosInteresModel=array('SitiosInteresModel'=>$SitiosInteresModel);		
            $estructura=view('head').view('header').view('index').view('adminSitios',$SitiosInteresModel);
            return $estructura;
        }
    
    }
	
	//Elimina la informacion ingresada de un sitio en especial
	
	public function eliminar(){
		$SitiosInteresModel= new SitiosInteresModel();
		$request=\Config\Services::request();
		$idSitio=$request->getPostGet('idSitio');
		$SitiosInteresModel->delete($idSitio);
		$SitiosInteresModel=$SitiosInteresModel->findAll();
		$SitiosInteresModel=array('SitiosInteresModel'=>$SitiosInteresModel);		
		$estructura=view('head').view('header').view('index').view('adminSitios',$SitiosInteresModel);
		return $estructura;
		
	}

}
