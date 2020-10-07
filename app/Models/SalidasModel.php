<?php namespace App\Models;

use CodeIgniter\Model;

class SalidasModel extends Model
{
    protected $table      = 'salidas';
    protected $primaryKey = 'idSalida';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['idClasificacion', 'nombreSalida','desSalida','dirMapa','incluyeSalida','noIncluyeSalida','fotoSalida','tipoDificultad','tipoSalida'];

}