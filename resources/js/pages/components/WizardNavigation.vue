<template>
    <div class="p-4 bg-gray-50 border-t border-gray-200 flex justify-center items-center gap-4">
        <!-- Botón anterior - SOLO visible si NO es el primer paso -->
        <button v-if="currentStep > 0" @click="emit('prev')"
            class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg border border-gray-600 font-medium text-sm transition-colors shadow-sm">
            ← Paso anterior
        </button>

        <!-- Botón siguiente o finalizar -->
        <button v-if="currentStep < totalSteps - 1" @click="emit('next')"
            class="bg-green-100 hover:bg-green-200 text-blue-900 px-6 py-2.5 rounded-lg border border-green-300 font-medium text-sm shadow-sm transition-colors">
            Paso siguiente →
        </button>

        <button v-else @click="emit('download')"
            class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-2.5 rounded-lg border border-gray-800 font-medium text-sm shadow-sm transition-colors">
            Descargar Contrato
        </button>
    </div>
</template>

<script setup lang="ts">
interface Props {
    currentStep: number;
    totalSteps: number;
}

const props = defineProps<Props>();

const emit = defineEmits<{
    'next': [];
    'prev': [];
    'download': [];
}>();
</script>