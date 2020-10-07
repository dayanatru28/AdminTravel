<?php namespace App\Models;

use CodeIgniter\Model;

class CotizacionesModel extends Model
{
    protected $table      = 'cotizaciones';
    protected $primaryKey = 'idCotizacion';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombreCoti', 'correoCoti','celularCoti','direccionCoti','destino','diaSalida','cantPersonas','cantNinos','cantDias','mensajeCoti'];

    protected $validationRules    = [
        'nombreCoti'=>'required|alpha_numeric_space|min_length[10]|max_length[100]',
        'correoCoti'=>'required|valid_email',
        'celularCoti'=>'required|is_natural|min_length[10]|max_length[10]',
        'direccionCoti'=>'required|max_length[150]',
        'cantPersonas'=>'required|is_natural_no_zero|min_length[1]|max_length[2]',
        'cantNinos'=>'required|is_natural_no_zero|min_length[1]|max_length[2]',
        'cantDias'=>'required|is_natural_no_zero|min_length[1]|max_length[2]'
    ];

    protected $validationMessages = [
        'nombreCoti'=>['alpha_numeric_space'=>'No puedes ingresar numeros en este campo'],
        'correoCoti'=>['valid_email'=>'No contiene el formato de email adecuado'],
        'celularCoti'=>['max_length[10]'=>'El campo debe contener 10 valores numericos',
                        'is_natural'=>'El campo solo debe contener valores numericos'],
        'cantPersonas'=>['is_natural_no_zero'=>'El campo solo debe contener valores numericos mayores a cero'], 
        'cantNinos'=>['is_natural_no_zero'=>'El campo solo debe contener valores numericos mayores a cero'], 
        'cantDias'=>['is_natural_no_zero'=>'El campo solo debe contener valores numericos mayores a cero']


    ];
    protected $skipValidation     = false;
}