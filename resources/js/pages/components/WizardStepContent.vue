<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

interface Props {
    currentStep: number;
    steps: Array<{ id: string; label: string; field: string }>;
    form: ReturnType<typeof useForm>;
}

const props = defineProps<Props>();

const formattedRent = computed(() => {
    return props.form.monthly_rent 
        ? new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(props.form.monthly_rent)
        : '__________';
});
</script>

<template>
    <div>
        <h2 class="text-2xl font-bold text-[#1a2b49] mb-8 leading-snug">
            {{ steps[currentStep].label }}
        </h2>

        <!-- Paso 1: Arrendador -->
        <div v-if="currentStep === 0" class="space-y-4">
            <p class="text-sm text-gray-500 mb-2">Introduzca el nombre completo de la persona o entidad propietaria.</p>
            <input 
                v-model="form.landlord_name" 
                type="text" 
                autofocus
                class="w-full border-2 border-gray-200 rounded-lg p-4 focus:border-[#007bff] outline-none transition-colors shadow-sm"
                placeholder="Nombre y apellidos"
            >
        </div>

        <!-- Paso 2: Arrendatario -->
        <div v-else-if="currentStep === 1" class="space-y-4">
            <input 
                v-model="form.tenant_name" 
                type="text" 
                autofocus
                class="w-full border-2 border-gray-200 rounded-lg p-4 focus:border-[#007bff] outline-none shadow-sm"
                placeholder="Nombre y apellidos del inquilino"
            >
        </div>

        <!-- Paso 3: Dirección -->
        <div v-else-if="currentStep === 2" class="space-y-4">
            <input 
                v-model="form.property_address" 
                type="text" 
                autofocus
                class="w-full border-2 border-gray-200 rounded-lg p-4 focus:border-[#007bff] outline-none shadow-sm"
                placeholder="Ej: Calle Mayor, 1, Madrid"
            >
        </div>

        <!-- Paso 4: Renta -->
        <div v-else-if="currentStep === 3" class="space-y-4">
            <div class="relative">
                <input 
                    v-model="form.monthly_rent" 
                    type="number" 
                    autofocus
                    class="w-full border-2 border-gray-200 rounded-lg p-4 focus:border-[#007bff] outline-none shadow-sm pr-12"
                >
                <span class="absolute right-4 top-4 text-gray-400">€</span>
            </div>
        </div>

        <!-- Paso 5: Duración -->
        <div v-else-if="currentStep === 4" class="space-y-4">
            <input 
                v-model="form.duration_years" 
                type="number" 
                autofocus
                class="w-full border-2 border-gray-200 rounded-lg p-4 focus:border-[#007bff] outline-none shadow-sm"
                placeholder="Número de años"
            >
        </div>
    </div>
</template>