<?php namespace App\Models;

use CodeIgniter\Model;

class ActividadesTurModel extends Model
{
    protected $table      = 'actividadestur';
    protected $primaryKey = 'idActividad';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['idSalida', 'nombreActividad', 'desActividad'];

}