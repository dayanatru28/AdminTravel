<?php namespace App\Models;

use CodeIgniter\Model;

class SitiosInteresModel extends Model
{
    protected $table      = 'sitiosinteres';
    protected $primaryKey = 'idSitio';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['idSalida', 'nombreSitio', 'desSitio'];

}