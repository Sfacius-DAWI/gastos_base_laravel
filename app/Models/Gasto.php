<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $table = 'gastos'; // Nombre de la tabla en la BD

    protected $fillable = [
        'titulo',
        'descripcion',
        'total',
        'fecha_registro'
    ];
}
?>