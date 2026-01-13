<template>
    <nav class="main-nav">
        <div class="nav-container">
            <!-- Logo y nombre -->
            <div class="nav-brand">
                <div class="logo-placeholder">
                    <!-- Icono de logo temporal -->
                    <svg class="logo-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <span class="brand-text">Wonder.Legal</span>
            </div>



            <!-- Enlaces de navegación -->
            <ul class="nav-links">
                <li v-for="(item, index) in navItems" :key="index" class="nav-item">
                    <a href="#" class="nav-link" @click.prevent="handleNavClick(item.label)"
                        @mouseenter="hoveredItem = index" @mouseleave="hoveredItem = null">
                        {{ item.label }}
                        <span class="hover-indicator" :class="{ 'hover-active': hoveredItem === index }"></span>
                    </a>
                </li>
            </ul>

            <!-- Barra de búsqueda centrada -->
            <div class="nav-search">
                <div class="search-container">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" placeholder="Buscar documentos o plantillas..." class="search-input" disabled />
                </div>
            </div>

        </div>
    </nav>
</template>

<script setup lang="ts">
import { ref } from 'vue';

// Estado para controlar qué ítem está en hover
const hoveredItem = ref<number | null>(null);

// Datos de los elementos de navegación
const navItems = [
    { label: 'INICIO', path: '/' },
    { label: 'DOCUMENTOS', path: '/documents' },
    { label: 'FAQ', path: '/faq' },
    { label: 'MI CUENTA', path: '/account' }
];
</script>

<style scoped>
.main-nav {
    background-color: #ffffff;
    border-bottom: 1px solid #eaeaea;
    padding: 0.75rem 0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.nav-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
}

/* Logo y marca */
.nav-brand {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-shrink: 0;
}

.logo-placeholder {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #007bff, #0056b3);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-icon {
    width: 20px;
    height: 20px;
    color: white;
}

.brand-text {
    font-size: 1.4rem;
    font-weight: 700;
    color: #1a2b49;
    letter-spacing: -0.5px;
}

/* Barra de búsqueda centrada */
.nav-search {
    flex: 1;
    max-width: 500px;
    margin: 0 2rem;
}

.search-container {
    position: relative;
    width: 100%;
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    width: 18px;
    height: 18px;
    color: #94a3b8;
    pointer-events: none;
}

.search-input {
    width: 100%;
    padding: 0.7rem 1rem 0.7rem 2.8rem;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    background-color: #f8fafc;
    font-size: 0.95rem;
    color: #334155;
    transition: all 0.2s ease;
}

.search-input:focus {
    outline: none;
    border-color: #007bff;
    background-color: white;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
}

.search-input:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

/* Enlaces de navegación */
.nav-links {
    display: flex;
    list-style: none;
    gap: 1.8rem;
    margin: 0;
    padding: 0;
    flex-shrink: 0;
}

.nav-item {
    position: relative;
}

.nav-link {
    text-decoration: none;
    color: #4a5568;
    font-weight: 500;
    font-size: 0.95rem;
    padding: 0.5rem 0.2rem;
    position: relative;
    transition: color 0.2s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Indicador verde en hover */
.hover-indicator {
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: #10b981;
    /* Color verde */
    border-radius: 2px;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-active {
    transform: scaleX(1);
}

/* Efecto hover completo */
.nav-link:hover {
    color: #10b981;
    /* Verde en texto también */
}

.nav-link:hover .hover-indicator {
    transform: scaleX(1);
}
</style>