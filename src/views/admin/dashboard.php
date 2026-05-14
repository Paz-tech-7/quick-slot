<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - QuickSlot</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: '#4F46E5',
                        bg_system: '#F3F4F6',
                        text_main: '#1F2937',
                        sidebar: '#111827' 
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-bg_system text-text_main font-sans antialiased flex h-screen overflow-hidden">

    <!-- FONDO OSCURO PARA EL MENÚ LATERAL EN MÓVIL (Overlay) -->
    <!-- Por qué: Fija la atención en el menú cuando se abre y oscurece el resto. -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden transition-opacity md:hidden"></div>

    <!-- MENU LATERAL (Sidebar) -->
    <!-- En móvil está fuera de la pantalla (-translate-x-full). En PC es relativo y visible (md:translate-x-0) -->
    <aside id="sidebar" class="w-64 bg-sidebar text-white flex flex-col fixed inset-y-0 left-0 z-40 transform -translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0">
        
        <!-- Cabecera del Sidebar con botón de cerrar para móvil -->
        <div class="h-16 flex items-center justify-between px-6 border-b border-gray-800">
            <span class="font-extrabold text-xl text-white">QuickSlot <span class="text-xs text-primary bg-indigo-900 px-2 py-1 rounded ml-1">ADMIN</span></span>
            <button id="close-sidebar" class="md:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Enlaces del menú -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="#" class="flex items-center gap-3 bg-gray-800 text-white px-4 py-3 rounded-lg font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Panel Resumen
            </a>
            <a href="#" class="flex items-center gap-3 text-gray-400 hover:bg-gray-800 hover:text-white px-4 py-3 rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                Gestión de Salas
            </a>
            <a href="#" class="flex items-center gap-3 text-gray-400 hover:bg-gray-800 hover:text-white px-4 py-3 rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Usuarios
            </a>
        </nav>
        
        <div class="p-4 border-t border-gray-800">
            <a href="#" class="flex items-center gap-3 text-red-400 hover:text-red-300 font-medium px-4 py-2">
                Cerrar Sesión
            </a>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <!-- Header superior adaptado a móvil -->
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-4 md:px-8 shrink-0 z-10">
            <div class="flex items-center gap-4">
                <!-- Botón hamburguesa para abrir Sidebar (Solo en móvil) -->
                <button id="open-sidebar" class="md:hidden text-gray-500 hover:text-primary">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h1 class="text-lg md:text-xl font-bold truncate">Gestión de Salas</h1>
            </div>
            
            <button class="bg-primary hover:bg-indigo-700 text-white px-3 py-2 md:px-4 md:py-2 rounded-lg font-semibold text-xs md:text-sm shadow flex items-center gap-2 transition whitespace-nowrap">
                <span class="hidden sm:inline">+ Añadir Nueva Sala</span>
                <span class="sm:hidden">+ Añadir</span>
            </button>
        </header>

        <!-- Área de contenido con scroll -->
        <div class="flex-1 overflow-y-auto p-4 md:p-8">
            
            <!-- Tarjetas de métricas -->
            <!-- En móvil: grid-cols-1, en tablet: md:grid-cols-3 -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
                <div class="bg-white p-5 md:p-6 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center md:block">
                    <p class="text-sm font-medium text-gray-500 mb-0 md:mb-1">Salas Operativas</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800">2</p>
                </div>
                <div class="bg-white p-5 md:p-6 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center md:block">
                    <p class="text-sm font-medium text-gray-500 mb-0 md:mb-1">Reservas Hoy</p>
                    <p class="text-2xl md:text-3xl font-bold text-primary">8</p>
                </div>
                <div class="bg-white p-5 md:p-6 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center md:block">
                    <p class="text-sm font-medium text-gray-500 mb-0 md:mb-1">En Mantenimiento</p>
                    <p class="text-2xl md:text-3xl font-bold text-red-500">1</p>
                </div>
            </div>

            <!-- Tabla de Datos (Data Table) con Scroll Horizontal para Móviles -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Este div extra 'overflow-x-auto' es la clave para tablas responsivas -->
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aforo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Fila 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#001</td>
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">Sala Gaudí</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 pers.</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Disponible</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-primary hover:text-indigo-900 mr-3">Editar</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Borrar</a>
                                </td>
                            </tr>
                            <!-- Fila 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#002</td>
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">Sala Velázquez</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">40 pers.</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Mantenim.</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-primary hover:text-indigo-900 mr-3">Editar</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Borrar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- Script para gestionar el menú lateral en móviles -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const openBtn = document.getElementById('open-sidebar');
        const closeBtn = document.getElementById('close-sidebar');

        // Función para abrir el menú (Quita el translate negativo y muestra el fondo oscuro)
        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        // Función para cerrar el menú (Añade el translate negativo y oculta el fondo oscuro)
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        openBtn.addEventListener('click', openSidebar);
        closeBtn.addEventListener('click', closeSidebar);
        
        // Si el usuario toca la zona negra fuera del menú, también se cierra
        overlay.addEventListener('click', closeSidebar);
    </script>
</body>
</html>