<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

interface Props {
    form: ReturnType<typeof useForm>;
    currentStep: number;
}

const props = defineProps<Props>();

const formattedRent = computed(() => {
    return props.form.monthly_rent
        ? new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(props.form.monthly_rent)
        : '__________';
});
</script>

<template>
    <main class="w-full flex flex-col h-screen overflow-hidden bg-gray-50">
        <div class="p-8 flex justify-center h-full">
            <article id="contract-preview-content"
                class="bg-[#ffffff] w-full max-w-[800px] shadow-sm border border-[#d1d5db] p-[60px] font-sans text-[#2c3e50] text-[14px] leading-[1.6] relative h-full overflow-y-auto">

                <!-- Título principal -->
                <header class="text-center mb-12">
                    <h1 class="text-[22px] font-bold uppercase tracking-wider mb-2">CONTRATO DE ARRENDAMIENTO DE
                        VIVIENDA</h1>
                    <p class="text-[#4b5563]">
                        En <span :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>,
                        a <span :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>
                    </p>
                </header>

                <!-- Sección REUNIDOS -->
                <section class="mb-10">
                    <h2 class="font-bold text-center mb-6">REUNIDOS</h2>

                    <p class="mb-4"><strong>De una parte,</strong></p>
                    <p class="mb-4">
                        <span :class="{ 'bg-[#fef9c3] border-b border-dashed border-[#9ca3af]': currentStep === 0 }">
                            {{ form.landlord_name || '________' }}
                        </span>,
                        con DNI/NIF <span :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>,
                        y con domicilio en: <span :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>.
                    </p>
                    <p class="mb-6">En adelante, el <strong>"Arrendador"</strong>.</p>

                    <p class="mb-4"><strong>Y de otra parte,</strong></p>
                    <p class="mb-4">
                        <span :class="{ 'bg-[#fef9c3] border-b border-dashed border-[#9ca3af]': currentStep === 1 }">
                            {{ form.tenant_name || '________' }}
                        </span>,
                        con DNI/NIF <span :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>,
                        y con domicilio en: <span :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>.
                    </p>
                    <p class="mb-8">En adelante, el <strong>"Arrendatario"</strong>.</p>

                    <p>Y que, a continuación, serán referidas, individualmente como la <strong>"Parte"</strong> y, de
                        forma conjunta,
                        como las <strong>"Partes"</strong>. Las Partes, en la calidad con la que actúan, y
                        reconociéndose capacidad
                        jurídica para contratar y obligarse, y en especial para el otorgamiento del presente CONTRATO DE
                        ARRENDAMIENTO DE VIVIENDA. En adelante, el <strong>"Contrato"</strong>.</p>
                </section>

                <!-- Sección EXPONEN -->
                <section class="mb-10">
                    <h2 class="font-bold mb-4">EXPONEN</h2>

                    <p class="mb-4"><strong>I.</strong> Que el Arrendador es propietario de la vivienda ubicada en:
                        <span :class="{ 'bg-[#fef9c3] border-b border-dashed border-[#9ca3af]': currentStep === 2 }">
                            {{ form.property_address || '________' }}
                        </span>,
                        con la siguiente Referencia Catastral: <span
                            :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>.
                        La vivienda cuenta con <span :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>
                        metros cuadrados de superficie, y presenta las siguientes características:
                    </p>
                    <p class="mb-6">En adelante, la <strong>"Vivienda"</strong>.</p>

                    <p class="mb-4"><strong>II.</strong> Que el Arrendador ha exhibido una copia del Certificado de
                        Eficiencia Energética de la Vivienda de acuerdo con lo regulado en el Real Decreto 235/2013, de
                        5 de abril, por el que se aprueba el procedimiento básico para la certificación de la eficiencia
                        energética de los edificios.</p>

                    <p class="mb-6"><strong>III.</strong> Que el Arrendatario desea arrendar la Vivienda para su uso
                        personal de vivienda habitual, y el Arrendador está interesado en arrendársela, así convienen
                        pactar, de forma expresa y detallada, la oferta y aceptación en arrendamiento de la misma,
                        acordando expresamente otorgar el presente contrato de arrendamiento de vivienda que se rige por
                        las siguientes</p>

                    <h2 class="font-bold text-center text-[16px] mt-10 mb-6">CLÁUSULAS</h2>
                </section>

                <!-- Cláusula PRIMERA: OBJETO -->
                <section class="mb-8">
                    <h3 class="font-bold mb-2">PRIMERA. OBJETO</h3>
                    <p class="mb-3">El presente Contrato tiene por objeto la constitución y regulación del arrendamiento
                        de la Vivienda entre el Arrendador y el Arrendatario, de acuerdo con las condiciones pactadas en
                        este Contrato.</p>
                    <p class="mb-3">El Arrendatario utilizará la Vivienda exclusivamente como vivienda habitual propia,
                        no pudiéndose variar dicho uso sin consentimiento previo, expreso, y por escrito del Arrendador.
                        El incumplimiento de esto será motivo de resolución del contrato.</p>
                </section>

                <!-- Cláusula SEGUNDA: DURACIÓN -->
                <section class="mb-8">
                    <h3 class="font-bold mb-2">SEGUNDA. DURACIÓN Y PRÓRROGAS</h3>
                    <p class="mb-3">El arrendamiento se pacta por el plazo siguiente:
                        <span :class="{ 'bg-[#fef9c3] border-b border-dashed border-[#9ca3af]': currentStep === 4 }">
                            {{ form.duration_years ? `${form.duration_years} años` : '________' }}
                        </span>,
                        a contar desde el siguiente día: <span
                            :class="{ 'bg-[#fef9c3]': currentStep === -1 }">________</span>.
                    </p>
                    <!-- (Texto legal de prórrogas de la web) -->
                </section>

                <!-- Cláusula TERCERA: RENTA -->
                <section class="mb-8">
                    <h3 class="font-bold mb-2">TERCERA. LA RENTA Y SU ACTUALIZACIÓN</h3>
                    <p class="mb-3">La renta pactada por las Partes es de
                        <span :class="{ 'bg-[#fef9c3] border-b border-dashed border-[#9ca3af]': currentStep === 3 }">
                            {{ formattedRent }}
                        </span>
                        (<span :class="{ 'bg-[#fef9c3]': currentStep === 3 }">{{ form.monthly_rent || '________' }}
                            €</span>) mensuales que el Arrendatario pagará al Arrendador cada mes, anticipadamente.
                    </p>
                    <!-- (Detalles de pago y actualización de la web) -->
                </section>

                <!-- Cláusulas CUARTA y QUINTA (sin campos de formulario) -->
                <section class="mb-8">
                    <h3 class="font-bold mb-2">CUARTA. GASTOS GENERALES</h3>
                    <p class="mb-3">El Arrendatario pagará los gastos individuales de electricidad, agua, gas, tasas de
                        basura y similares de la Vivienda. No obstante, el precio expresado como renta por el
                        arrendamiento de la Vivienda incluye los gastos por los servicios y suministros individualizados
                        de luz, agua, gas o similares medidos por contador individualizado que se pudieran disfrutar en
                        la Vivienda, así como las tasas administrativas por recogidas de basuras y tratamiento de
                        residuos urbanos, alcantarillado o servicios similares prestados a la misma.</p>
                </section>

                <section class="mb-8">
                    <h3 class="font-bold mb-2">QUINTA. OBRAS EN LA VIVIENDA</h3>
                    <p class="mb-3">Dado que el objetivo esencial del Contrato consiste en la cesión en arrendamiento
                        del disfrute normal de la Vivienda, el Arrendatario no podrá realizar sin el consentimiento
                        —expreso y por escrito— del Arrendador, obras que modifiquen la configuración de la Vivienda y
                        cualesquiera otras dependencias, o espacios accesorios, así como las fachadas, arrendados en
                        este Contrato.</p>
                </section>

            </article>
        </div>
    </main>
</template>