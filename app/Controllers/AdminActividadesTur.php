<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SalidasModel;
use App\Models\ActividadesTurModel;


class AdminActividadesTur extends BaseController
{
    public function index()
	{
		//Muestra la tabla con todos las actividades ingresadas anteriormente
		$ActividadesTurModel= new ActividadesTurModel();
		$ActividadesTurModel=$ActividadesTurModel->findAll();
		$ActividadesTurModel=array('ActividadesTurModel'=>$ActividadesTurModel);		
		$estructura=view('head').view('header').view('index').view('adminActividadesTur',$ActividadesTurModel);
		return $estructura;
	}
	
	//Muestra el formulario para ingresar una nueva actividad
	public function mostrarFormulario(){

		$salidasModel= new SalidasModel();
		$salidasModel= $salidasModel->findAll();
		$salidasModel= array('salidasModel'=>$salidasModel);

		$estructura=view('head').view('header').view('index').view('nuevaActividadTur',$salidasModel);
		return $estructura;
	}


	//Inserta el nombre y la descripcion de la nueva actividad

	public function insertar(){

		$request=\Config\Services::request();
        $ActividadesTurModel= new ActividadesTurModel();

		$data = array(
			'idSalida'=> $request->getPostGet('idSalida'),
            'nombreActividad'    => $request->getPostGet('nombreActividad'),
            'desActividad'    => $request->getPostGet('desActividad')
        );
       
        if($request->getPostGet('idActividad')){
			$data['idActividad']=$request->getPostGet('idActividad');
		}
        if($ActividadesTurModel->save($data)===false)	{
            echo "Error";
        }
        else{
			$ActividadesTurModel=$ActividadesTurModel->findAll();
            $ActividadesTurModel=array('ActividadesTurModel'=>$ActividadesTurModel);		
            $estructura=view('head').view('header').view('index').view('adminActividadesTur',$ActividadesTurModel);
            return $estructura;
        }
    
	}
	
	//Carga la informacion incluida en la base de datos de cada actividad para ser editada en un formulario
    public function formEditar(){

		$salidasModel= new SalidasModel();
		//recibimos el id de la salida para realizar la busqueda del nombre en la base de datos
		$request=\Config\Services::request();
		$idSalida=$request->getPostGet('idSalida');
		$salidasModel= $salidasModel->find([$idSalida]);
		$salidasModel= array('salidasModel'=>$salidasModel);

        $ActividadesTurModel= new ActividadesTurModel();
        //Se recibe el id del sitio para cargar la informacion guardada anteriormente
		$idActividad=$request->getPostGet('idActividad');
		$ActividadesTurModel=$ActividadesTurModel->find([$idActividad]);
        $ActividadesTurModel=array('ActividadesTurModel'=>$ActividadesTurModel);

        $datos['salidasModel']=$salidasModel;
        $datos['ActividadesTurModel']=$ActividadesTurModel;
        
        $estructura=view('head').view('header').view('index').view('editarActividadTur',$datos);
		return $estructura;
	}

	//Editar la informacion sobre nombre y descripcion de una actividad en especial

	public function editar(){

		$request=\Config\Services::request();
        $ActividadesTurModel= new ActividadesTurModel();

		$data = array(
            'nombreActividad'    => $request->getPostGet('nombreActividad'),
            'desActividad'    => $request->getPostGet('desActividad')
        );
       
        if($request->getPostGet('idActividad')){
			$data['idActividad']=$request->getPostGet('idActividad');
		}
        if($ActividadesTurModel->save($data)===false)	{
            echo "Error";
        }
        else{
			$ActividadesTurModel=$ActividadesTurModel->findAll();
            $ActividadesTurModel=array('ActividadesTurModel'=>$ActividadesTurModel);		
            $estructura=view('head').view('header').view('index').view('adminActividadesTur',$ActividadesTurModel);
            return $estructura;
        }
    
    }


	//Elimina la informacion ingresada de una actividad
	
	public function eliminar(){
		$ActividadesTurModel= new ActividadesTurModel();
		$request=\Config\Services::request();
		$idActividad=$request->getPostGet('idActividad');
		$ActividadesTurModel->delete($idActividad);
		$ActividadesTurModel=$ActividadesTurModel->findAll();
		$ActividadesTurModel=array('ActividadesTurModel'=>$ActividadesTurModel);		
		$estructura=view('head').view('header').view('index').view('adminActividadesTur',$ActividadesTurModel);
		return $estructura;
		
	}
    
    
}