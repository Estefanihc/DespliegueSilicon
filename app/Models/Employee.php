<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Employee extends Model
{
    use HasFactory;

    // Atributos permitidos para la asignación masiva
    protected $fillable = [
        'first_name',
        'last_name',
        'hire_date',
        'address',
        'phone',
        'email',
        'role', 
        'user_id',
    ];

    /**
     * Mutador: almacena 'first_name' en minúsculas.
     * Accesor: devuelve 'first_name' con cada palabra iniciando en mayúscula.
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value), // Mutador
            get: fn ($value) => ucwords(strtolower($value)) // Accesor: cada palabra con la primera letra en mayúscula
        );
    }

    /**
     * Mutador: almacena 'last_name' en minúsculas.
     * Accesor: devuelve 'last_name' con cada palabra iniciando en mayúscula.
     */
    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value), // Mutador
            get: fn ($value) => ucwords(strtolower($value)) // Accesor: cada palabra con la primera letra en mayúscula
        );
    }
    // En el modelo Employee.php
    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
