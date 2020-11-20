<?php namespace App\Models;

use CodeIgniter\Model;


class BuscadorModel extends Model
{
    protected $table      = 'buscador';
    protected $primaryKey = 'idBuscador';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['idSalida', 'idPlan'];

}