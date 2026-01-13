<template>
    <div
        class="fixed top-24 right-10 2xl:right-auto 2xl:left-[calc(50%+420px)] z-30 bg-gray-50 p-4 w-64 font-sans text-[#2c3e50]">
        <!-- Contenedor principal -->
        <div>
            <!-- Texto "Progresión" pequeño y en negrita -->
            <div class="mb-3">
                <span class="text-sm font-bold">Progresión:</span>
            </div>

            <!-- Barra más gruesa con porcentaje integrado -->
            <div class="relative w-full bg-gray-200 h-4 rounded-full overflow-hidden">
                <!-- Barra de progreso azul oscuro -->
                <div class="bg-blue-800 h-full transition-all duration-300" :style="{ width: progress + '%' }">
                    <!-- Porcentaje dentro de la barra azul -->
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-xs font-semibold text-white">
                        {{ Math.round(progress) }}%
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
interface Props {
    progress: number;
}

defineProps<Props>();
</script>
