<?php namespace App\Models;

use CodeIgniter\Model;

class ReservacionesModel extends Model
{
    protected $table      = 'reservaciones';
    protected $primaryKey = 'idReservacion';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['codigoReserva','nombreReserva', 'correoReserva','salidaReserva','destinoReserva','cantPersonas','cantNinos','costoPersona','diaSalida','diaLlegada','menReserva'];

}