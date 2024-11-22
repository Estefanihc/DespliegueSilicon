<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    /**
     * Mutador: almacena 'name' en minúsculas.
     * Accesor: devuelve 'name' con cada palabra iniciando en mayúscula.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value), // Mutador
            get: fn ($value) => ucwords(strtolower($value)) // Accesor: cada palabra con la primera letra en mayúscula
        );
    }

    /**
     * Mutador: almacena 'description' en minúsculas.
     * Accesor: devuelve 'description' con solo la primera letra en mayúscula.
     */
    protected function description(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value), // Mutador
            get: fn ($value) => ucfirst(strtolower($value)) // Accesor: solo la primera letra en mayúscula
        );
    }
    public function productPurchases()
{
    return $this->hasMany(ProductPurchase::class);
}
}
