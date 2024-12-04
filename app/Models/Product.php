<?php
//Prueba Técnica para Nerdcom
//Lic Informatica. José Perera
//Fecha: 04/12/2024

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
