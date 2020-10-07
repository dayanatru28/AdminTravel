<?php namespace App\Models;

use CodeIgniter\Model;


class ImagenesModel extends Model
{
    protected $table      = 'fotossalidas';
    protected $primaryKey = 'idFoto';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['idSalida', 'direcFoto'];

    //Agrega direccion de las imagenes en cada una

    protected $beforeInsert=['agregarDirecFoto'];

    protected function agregarDirecFoto(array $data){
        $data['data']['direcFoto']="/public/img/multimedia/".$data['data']['direcFoto'];
        return $data;
    }

}