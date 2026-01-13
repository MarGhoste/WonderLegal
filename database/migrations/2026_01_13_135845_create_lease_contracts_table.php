<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lease_contracts', function (Blueprint $table) {
            $table->id();

            // 1. Ubicación del Inmueble
            $table->string('property_address')->nullable();

            // 2. Identificación del Arrendador
            $table->string('landlord_name')->nullable();

            // 3. Identificación del Arrendatario
            $table->string('tenant_name')->nullable();

            // 4. Renta Mensual (Usamos decimal para precisión financiera)
            $table->decimal('monthly_rent', 10, 2)->nullable();

            // 5. Duración del Contrato
            $table->unsignedInteger('duration_years')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lease_contracts');
    }
};
