<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si es diferente
    protected $table = 'suppliers';

    // Campos asignables (que se pueden llenar en las consultas masivas)
    protected $fillable = [
        'company_name', 
        'fiscal_address', 
        'email', 
        'phone', 
        'credit_line'
    ];

    // Método para crear URLs amigables
    public function getRouteKeyName()
    {
        return 'company_name';
    }
}
