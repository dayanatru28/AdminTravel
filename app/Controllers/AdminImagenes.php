<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SalidasModel;
use App\Models\ImagenesModel;

class AdminImagenes extends BaseController
{
    public function index()
	{
		$imagenesModel= new ImagenesModel();
		$imagenesModel=$imagenesModel->findAll();
		$imagenesModel=array('imagenesModel'=>$imagenesModel);		
		$estructura=view('head').view('header').view('index').view('adminImagenes',$imagenesModel);
		return $estructura;
	}

	//Muestra el formulario para ingresar una nueva imagen
	public function mostrarFormulario(){

		$salidasModel= new SalidasModel();
		$salidasModel= $salidasModel->findColumn('nombreSalida');
		$salidasModel= array('salidasModel'=>$salidasModel);

		$estructura=view('head').view('header').view('index').view('nuevaImagen',$salidasModel);
		return $estructura;

	}

	//Inserta la direccion de a imagen y el tipo de salida

	public function insertar(){
		//$this->guardarImagen();
		$imagenesModel= new ImagenesModel();
		$request=\Config\Services::request();
		

		$idSalida=$request->getPostGet('idSalida');
        //como llega en arreglo, se convierte el valor en un numero para buscar en la base de datos, se suma 1 porque el arreglo comienza en 0 y los id desde 1
        $idSalida=intval($idSalida);
		$idSalida=$idSalida+1;

		$data = array(
			'idSalida'=> $idSalida,
			'direcFoto'    => $request->getPostGet('direcFoto'),
		);

		if($imagenesModel->insert($data)===false)	{
			echo "Error";
		}
		else{
			$imagenesModel= new ImagenesModel();
			$imagenesModel=$imagenesModel->findAll();
			$imagenesModel=array('imagenesModel'=>$imagenesModel);		
			$estructura=view('head').view('header').view('index').view('adminImagenes',$imagenesModel);
			return $estructura;
		}
	}

	public function eliminar(){
		$imagenesModel= new ImagenesModel();
		$request=\Config\Services::request();
		$idFoto=$request->getPostGet('idFoto');
		$imagenesModel->delete($idFoto);
		$imagenesModel=$imagenesModel->findAll();
		$imagenesModel=array('imagenesModel'=>$imagenesModel);		
		$estructura=view('head').view('header').view('index').view('adminImagenes',$imagenesModel);
		return $estructura;
		
	}

	private function guardarImagen(){
		$mi_imagen = 'direcFoto';
    	$config['upload_path'] = "./public/img";
    	$config['file_name'] = "nombre_archivo";
    	$config['allowed_types'] = "gif|jpg|jpeg|png";
   		$config['max_size'] = "50000";
    	$config['max_width'] = "2000";
		$config['max_height'] = "2000";
		   
	$this->upload = new Upload($config);
    //$this->load->library('upload', $config);

    if (!$this->upload->do_upload($mi_imagen)) {
        //*** ocurrio un error
        $data['uploadError'] = $this->upload->display_errors();
        echo $this->upload->display_errors();
        return;
    }

    $data['uploadSuccess'] = $this->upload->data();
	}

}
