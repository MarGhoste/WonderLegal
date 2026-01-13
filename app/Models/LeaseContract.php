<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaseContract extends Model
{
    // Definimos los 5 campos de nuestra prueba técnica
    protected $fillable = [
        'property_address', // 1. Ubicación del Inmueble
        'landlord_name',    // 2. Identificación del Arrendador
        'tenant_name',      // 3. Identificación del Arrendatario
        'monthly_rent',     // 4. Renta Mensual
        'duration_years',   // 5. Duración del Contrato
    ];
}
