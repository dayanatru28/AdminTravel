<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservacionesModel;
use App\Models\SalidasModel;

class AdminReservaciones extends BaseController
{

    //Muestra la tabla con todas las reservaciones realizadas
    public function index()
	{
		$ReservacionesModel= new ReservacionesModel();
		$ReservacionesModel=$ReservacionesModel->findAll();
		$ReservacionesModel=array('ReservacionesModel'=>$ReservacionesModel);		
		$estructura=view('head').view('header').view('index').view('adminReservaciones',$ReservacionesModel);
		return $estructura;
    }
	
	//Permite vizualisar el formulario para ingresar una nueva reservacion
	public function nuevaReservacion(){

		$salidasModel= new SalidasModel();
		//Envia la consulta de todas las salidas disponibles hasta el momento
		$salidasModel= $salidasModel->findAll();
		$salidasModel= array('salidasModel'=>$salidasModel);
		$estructura=view('head').view('header').view('index').view('nuevaReservacion',$salidasModel);
		return $estructura;

	}

	//Permite insertar una nueva Reservacion por parte de la corporacion
	public function insertar(){
		$ReservacionesModel= new ReservacionesModel();
		$request=\Config\Services::request();

		//Genero el codigo de reserva para luego la busqueda en la pagina principal
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
		function generate_string($input, $strength = 16) {
			$input_length = strlen($input);
			$random_string = '';
			for($i = 0; $i < $strength; $i++) {
				$random_character = $input[mt_rand(0, $input_length - 1)];
				$random_string .= $random_character;
			}
		
			return $random_string;
		}
		$codigo=generate_string($permitted_chars, 10); 

		//Recibe los datos y los almacena en un arreglo
		$data = array(
			'codigoReserva'	   => $codigo,
			'nombreReserva'    => $request->getPostGet('nombreReserva'),
			'correoReserva'    =>  $request->getPostGet('correoReserva'),
			'salidaReserva'    =>  $request->getPostGet('salidaReserva'),
			'destinoReserva'    => $request->getPostGet('destino'),
			'cantPersonas'    =>  $request->getPostGet('cantPersonas'),
			'cantNinos'    =>  $request->getPostGet('cantNinos'),
			'costoPersona'    =>  $request->getPostGet('costoPersona'),
			'diaSalida'    =>  $request->getPostGet('trip-start1'),
			'diaLlegada'    =>  $request->getPostGet('trip-start'),
			'menReserva'    =>  $request->getPostGet('menReserva')
		);

		//me permite saber si ya hay una reservacion con el mismo numero solo modifica la informacion si no es asi crea un id nuevo

		if($request->getPostGet('idReservacion')){
			$data['idReservacion']=$request->getPostGet('idReservacion');
		}
		
		if($ReservacionesModel->save($data)===false)	{
			echo ("Eey.. No podemos agregar tu solicitud");
		}
		else{
			$this->sendMail($codigo);
			$ReservacionesModel=$ReservacionesModel->findAll();
			$ReservacionesModel=array('ReservacionesModel'=>$ReservacionesModel);		
			$estructura=view('head').view('header').view('index').view('adminReservaciones',$ReservacionesModel);
			return $estructura;
		}	

	}

	//Presenta el formulario de editar con la informacion ingresada anteriormente de cada reservacion
	public function formEditar(){
		//busco la informacion ingresada anteriormente
		$ReservacionesModel= new ReservacionesModel();
		$request=\Config\Services::request();
		$idReservacion=$request->getPostGet('idReservacion');
		$reservaciones=$ReservacionesModel->find([$idReservacion]);
		$reservaciones=array('reservaciones'=>$reservaciones);

		$estructura=view('head').view('header').view('index').view('editarReservacion',$reservaciones);
		return $estructura;

	}

	//Permite editar la informacion ingresada de una reservacion

	public function editar(){
		$ReservacionesModel= new ReservacionesModel();
		$request=\Config\Services::request();
		//Recibe los datos y los almacena en un arreglo
		$codigo=$request->getPostGet('codigoReserva');
		$data = array(
			'nombreReserva'    => $request->getPostGet('nombreReserva'),
			'correoReserva'    =>  $request->getPostGet('correoReserva'),
			'salidaReserva'    =>  $request->getPostGet('salidaReserva'),
			'cantPersonas'    =>  $request->getPostGet('cantPersonas'),
			'cantNinos'    =>  $request->getPostGet('cantNinos'),
			'costoPersona'    =>  $request->getPostGet('costoPersona'),
			'diaSalida'    =>  $request->getPostGet('trip-start1'),
			'diaLlegada'    =>  $request->getPostGet('trip-start'),
			'menReserva'    =>  $request->getPostGet('menReserva')
		);

		//me permite saber si ya hay una reservacion con el mismo numero solo modifica la informacion si no es asi crea un id nuevo

		if($request->getPostGet('idReservacion')){
			$data['idReservacion']=$request->getPostGet('idReservacion');
		}
		
		if($ReservacionesModel->save($data)===false)	{
			echo ("Eey.. No podemos agregar tu solicitud");
		}
		else{
			$this->sendMail($codigo);
			$ReservacionesModel=$ReservacionesModel->findAll();
			$ReservacionesModel=array('ReservacionesModel'=>$ReservacionesModel);		
			$estructura=view('head').view('header').view('index').view('adminReservaciones',$ReservacionesModel);
			return $estructura;
		}	

	}
	

    //Permite eliminar u ocultar alguna reservacion en especifico

	public function eliminar(){
		$ReservacionesModel= new ReservacionesModel();
		$request=\Config\Services::request();
		$idReservacion=$request->getPostGet('idReservacion');
		$ReservacionesModel->delete($idReservacion);
		$ReservacionesModel=$ReservacionesModel->findAll();
		$ReservacionesModel=array('ReservacionesModel'=>$ReservacionesModel);		
		$estructura=view('head').view('header').view('index').view('adminReservaciones',$ReservacionesModel);
		return $estructura;	
	}

	//Funcion que me permite enviar un correo a la persona ingresada para reportar su reservacion
	public function sendMail($codigo) { 
		$request=\Config\Services::request();
		$to = $this->request->getVar('correoReserva');
		$subject = ('Reservacion Corporacion Cuspide');
		$nombre=$request->getPostGet('nombreReserva');
		

		$message =('La corporacion cuspide ha realizado una reservacion sobre un viaje a nombre de '.$nombre. 
		' Para consultar la información de su reserva ingrese a la pagina principal de Cuspide Travel y digite el siguiente codigo
		en la seccion de reservas: '.$codigo);
        
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('leidy28ortega@gmail.com', 'Nueva reserva con Cuspide');
        
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) 
		{
			$ReservacionesModel= new ReservacionesModel();
            $ReservacionesModel=$ReservacionesModel->findAll();
			$ReservacionesModel=array('ReservacionesModel'=>$ReservacionesModel);		
			$estructura=view('head').view('header').view('index').view('adminReservaciones',$ReservacionesModel);
			return $estructura;
        } 
		else 
		{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
	}

}