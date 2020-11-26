<?php namespace App\Models;

use CodeIgniter\Model;

class SalidasModel extends Model
{
    protected $table      = 'salidas';
    protected $primaryKey = 'idSalida';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['idClasificacion', 'nombreSalida','desSalida','dirMapa','incluyeSalida','noIncluyeSalida','fotoSalida'];

     //Agrega direccion de las imagenes en cada una

    protected $beforeInsert=['agregarDirecFoto'];

    protected function agregarDirecFoto(array $data){
        $data['data']['fotoSalida']="/public/img/salida/".$data['data']['fotoSalida'];
        return $data;
    }
}