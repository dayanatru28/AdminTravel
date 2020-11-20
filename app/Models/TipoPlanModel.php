<?php namespace App\Models;

use CodeIgniter\Model;

class TipoPlanModel extends Model
{
    protected $table      = 'tipoplan';
    protected $primaryKey = 'idTipoPlan';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombreTipoPlan'];

}