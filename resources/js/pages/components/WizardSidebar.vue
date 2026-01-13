<template>
    <aside class="fixed left-6 2xl:left-auto 2xl:right-[calc(50%+420px)] top-32 z-30 w-96">
        <div class="bg-white rounded-xl shadow-lg border border-gray-200">
            <!-- Barra de progreso -->
            <WizardProgress :progress="progress" />

            <!-- Contenedor del contenido de la pregunta -->
            <div class="p-5">
                <!-- Componente WizardStepContent que ya tienes -->
                <WizardStepContent :current-step="currentStep" :steps="steps" :form="form" />
            </div>

            <!-- Navegación -->
            <WizardNavigation :current-step="currentStep" :total-steps="steps.length" @prev="$emit('prev-step')"
                @next="$emit('next-step')" @download="downloadPdf" />
        </div>
    </aside>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
// @ts-ignore
import html2pdf from 'html2pdf.js';
import WizardProgress from './WizardProgress.vue';
import WizardNavigation from './WizardNavigation.vue';
import WizardStepContent from './WizardStepContent.vue'; // Importar el componente

interface Props {
    currentStep: number;
    steps: Array<{ id: string; label: string; field: string }>;
    progress: number;
    form: ReturnType<typeof useForm>;
}

defineProps<Props>();

defineEmits<{
    'next-step': [];
    'prev-step': [];
    'submit': [];
}>();

const downloadPdf = () => {
    const element = document.getElementById('contract-preview-content');
    const opt = {
        margin: [10, 10], // Márgenes: [vertical, horizontal]
        filename: 'contrato-arrendamiento.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, useCORS: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(element).save();
};
</script>