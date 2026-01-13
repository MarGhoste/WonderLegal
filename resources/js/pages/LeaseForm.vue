<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import WizardSidebar from './components/WizardSidebar.vue';
import ContractPreview from './components/ContractPreview.vue';
import MainNavbar from './components/MainNavBar.vue';

interface ContractProps {
    contract: {
        id: number;
        property_address: string | null;
        landlord_name: string | null;
        tenant_name: string | null;
        monthly_rent: number | null;
        duration_years: number | null;
    };
}

const props = defineProps<ContractProps>();

const currentStep = ref(0);

const form = useForm({
    property_address: props.contract.property_address,
    landlord_name: props.contract.landlord_name,
    tenant_name: props.contract.tenant_name,
    monthly_rent: props.contract.monthly_rent,
    duration_years: props.contract.duration_years,
});

const steps = [
    { id: 'landlord', label: '¿Quién es el arrendador?', field: 'landlord_name' },
    { id: 'tenant', label: '¿Quién es el arrendatario?', field: 'tenant_name' },
    { id: 'address', label: '¿Cuál es la dirección de la vivienda?', field: 'property_address' },
    { id: 'rent', label: '¿A cuánto asciende la renta mensual?', field: 'monthly_rent' },
    { id: 'duration', label: '¿Cuál es la duración del contrato?', field: 'duration_years' },
];

const nextStep = () => { if (currentStep.value < steps.length - 1) currentStep.value++; };
const prevStep = () => { if (currentStep.value > 0) currentStep.value--; };

const progress = computed(() => ((currentStep.value + 1) / steps.length) * 100);

const submit = () => {
    form.put(route('lease.update', props.contract.id), { preserveScroll: true });
};
</script>

<template>
    <!-- Contenedor principal en columna -->
    <div class="flex flex-col h-screen w-full overflow-hidden bg-[#F2F5F8]">
        <!-- Menú superior -->
        <MainNavbar />

        <!-- Contenido principal (sidebar + preview) -->
        <div class="flex flex-1 overflow-hidden">
            <WizardSidebar :current-step="currentStep" :steps="steps" :progress="progress" :form="form"
                @next-step="nextStep" @prev-step="prevStep" @submit="submit" />

            <ContractPreview :form="form" :current-step="currentStep" />
        </div>
    </div>
</template>