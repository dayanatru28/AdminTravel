<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SalidasModel;
use App\Models\SitiosInteresModel;


class AdminSitiosInteres extends BaseController
{
    public function index()
	{
		$SitiosInteresModel= new SitiosInteresModel();
		$SitiosInteresModel=$SitiosInteresModel->findAll();
		$SitiosInteresModel=array('SitiosInteresModel'=>$SitiosInteresModel);		
		$estructura=view('head').view('header').view('index').view('adminSitios',$SitiosInteresModel);
		return $estructura;
	}

	//Muestra el formulario para ingresar un nuevo sitio de interes
	public function mostrarFormulario(){

		$salidasModel= new SalidasModel();
		$salidasModel= $salidasModel->findColumn('nombreSalida');
		$salidasModel= array('salidasModel'=>$salidasModel);

		$estructura=view('head').view('header').view('index').view('nuevoSitio',$salidasModel);
		return $estructura;

	}

	//Inserta el nombre y la descripcion del sitio de interes

	public function insertar(){

		$request=\Config\Services::request();
		$idSalida=$request->getPostGet('idSalida');
        //como llega en arreglo, se convierte el valor en un numero para buscar en la base de datos, se suma 1 porque el arreglo comienza en 0 y los id desde 1
        $idSalida=intval($idSalida);
        $idSalida=$idSalida+1;
        
        $SitiosInteresModel= new SitiosInteresModel();

		$data = array(
			'idSalida'=> $idSalida,
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
    
    //Carga la informacion incluida en la base de datos de cada sitio para ser editada
    public function editar(){

        $salidasModel= new SalidasModel();
		$salidasModel= $salidasModel->findColumn('nombreSalida');
		$salidasModel= array('salidasModel'=>$salidasModel);

        $SitiosInteresModel= new SitiosInteresModel();
        $request=\Config\Services::request();
		$idSitio=$request->getPostGet('idSitio');
		$SitiosInteresModel=$SitiosInteresModel->find([$idSitio]);
        $SitiosInteresModel=array('SitiosInteresModel'=>$SitiosInteresModel);

        $datos['salidasModel']=$salidasModel;
        $datos['SitiosInteresModel']=$SitiosInteresModel;
        
        $estructura=view('head').view('header').view('index').view('editarSitio',$datos);
		return $estructura;
    }



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
