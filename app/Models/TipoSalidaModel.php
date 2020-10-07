<?php namespace App\Models;

use CodeIgniter\Model;

class TipoSalidaModel extends Model
{
    protected $table      = 'tiposalida';
    protected $primaryKey = 'idTipoSalida';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombreTipoSalida'];

}