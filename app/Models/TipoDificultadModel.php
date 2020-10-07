<?php namespace App\Models;

use CodeIgniter\Model;

class TipoDificultadModel extends Model
{
    protected $table      = 'tipodificultad';
    protected $primaryKey = 'idTipoDificultad';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombreTipoDificultad'];

}