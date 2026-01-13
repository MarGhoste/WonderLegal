<?php

namespace App\Http\Controllers;

use App\Models\LeaseContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeaseContractController extends Controller
{
    /**
     * Muestra el formulario del contrato.
     */
    public function edit()
    {
        // Para esta prueba, buscaremos el primer registro o crearemos uno vacío
        $contract = LeaseContract::firstOrCreate([], [
            'property_address' => null,
            'landlord_name' => null,
            'tenant_name' => null,
            'monthly_rent' => null,
            'duration_years' => null,
        ]);

        return Inertia::render('LeaseForm', [
            'contract' => $contract
        ]);
    }

    /**
     * Actualiza los datos del contrato (petición vía Inertia/Axios).
     */
    public function update(Request $request, LeaseContract $leaseContract)
    {
        $validated = $request->validate([
            'property_address' => 'nullable|string|max:255',
            'landlord_name'    => 'nullable|string|max:255',
            'tenant_name'      => 'nullable|string|max:255',
            'monthly_rent'     => 'nullable|numeric',
            'duration_years'   => 'nullable|integer|min:1',
        ]);

        $leaseContract->update($validated);

        return back()->with('message', 'Progreso guardado correctamente.');
    }
}
