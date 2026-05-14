<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickSlot - Gestión de Reservas (Hero Background)</title>
    
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
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-bg_system text-text_main font-sans antialiased flex flex-col min-h-screen">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="font-extrabold text-2xl tracking-tight text-primary">QuickSlot</span>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="text-text_main hover:text-primary font-semibold transition-colors">Iniciar Sesión</a>
                    <a href="#" class="bg-primary hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-semibold transition-colors shadow-md">Regístrate</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-500 hover:text-primary focus:outline-none p-2">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg absolute w-full z-40">
            <div class="px-4 pt-2 pb-6 space-y-3 flex flex-col">
                <a href="#" class="block w-full text-center text-text_main hover:text-primary font-semibold py-3 border-b border-gray-100">Iniciar Sesión</a>
                <a href="#" class="block w-full text-center bg-primary hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold shadow-md transition-colors">Regístrate Gratis</a>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        
        <!-- =========================================================================
             NUEVA SECCIÓN HERO: Imagen de fondo con Overlay y texto centrado
             ========================================================================= -->
        <section class="relative max-w-7xl mx-auto my-4 md:my-8 rounded-3xl overflow-hidden shadow-2xl">
            
            <!-- 1. LA IMAGEN DE FONDO -->
            <img src="<?php echo APP_ROOT . '\public\img\imagenHomeHero.png'?>" alt="Fondo QuickSlot" class="absolute inset-0 w-full h-full object-cover object-center z-0">
            
            <!-- 2. LA CAPA DE CONTRASTE (Overlay) -->
            <!-- Es un filtro azul oscuro semitransparente para que el texto blanco se lea bien -->
            <div class="absolute inset-0 bg-indigo-900/80 z-10"></div>

            <!-- 3. EL CONTENIDO (Texto y botones) -->
            <div class="relative z-20 px-6 py-24 md:py-40 flex flex-col items-center text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-6 leading-tight text-white max-w-3xl">
                    La forma inteligente de <br>
                    <span class="text-indigo-300">reservar espacios</span>
                </h1>
                <p class="text-lg md:text-xl font-light text-indigo-100 max-w-2xl mb-10 px-2 md:px-0">
                    Olvídate de los conflictos de horarios y la gestión manual. QuickSlot te permite consultar disponibilidad en tiempo real y asegurar tu sala en segundos desde tu móvil u ordenador.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto px-4 sm:px-0">
                    <!-- Botón invertido: Ahora es blanco para resaltar sobre el fondo oscuro -->
                    <a href="#" class="w-full sm:w-auto bg-white hover:bg-gray-100 text-primary text-lg px-10 py-4 rounded-lg font-bold shadow-xl flex items-center justify-center gap-2 transition-colors">
                        Empezar a reservar
                    </a>
                </div>
            </div>
        </section>

        <!-- SECCIÓN DE CARACTERÍSTICAS -->
        <section class="bg-white py-12 md:py-16 border-t border-gray-100 mt-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <div class="p-6 bg-bg_system rounded-xl shadow-sm border border-gray-50 text-center md:text-left flex flex-col items-center md:items-start">
                        <div class="w-12 h-12 bg-indigo-100 text-primary rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Reserva en segundos</h3>
                        <p class="text-gray-600 font-light">Accede al catálogo, elige tu fecha y confirma. Todo de forma autónoma.</p>
                    </div>
                    <div class="p-6 bg-bg_system rounded-xl shadow-sm border border-gray-50 text-center md:text-left flex flex-col items-center md:items-start">
                        <div class="w-12 h-12 bg-indigo-100 text-primary rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Cero conflictos</h3>
                        <p class="text-gray-600 font-light">El sistema valida la disponibilidad en tiempo real para evitar Overbooking.</p>
                    </div>
                    <div class="p-6 bg-bg_system rounded-xl shadow-sm border border-gray-50 text-center md:text-left flex flex-col items-center md:items-start">
                        <div class="w-12 h-12 bg-indigo-100 text-primary rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">API para Cartelería</h3>
                        <p class="text-gray-600 font-light">Conecta pantallas externas a tus salas para mostrar la ocupación actual.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========================================================================
             SECCIÓN RECUPERADA: CÓMO FUNCIONA (Los 3 pasos)
             ========================================================================= -->
        <section class="bg-bg_system py-16 md:py-20 border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 md:mb-16">
                    <h2 class="text-3xl font-extrabold tracking-tight text-text_main sm:text-4xl">
                        Reserva en 3 sencillos pasos
                    </h2>
                    <p class="mt-4 text-lg text-gray-500 font-light">
                        Hemos diseñado una experiencia sin fricciones para que no pierdas ni un minuto.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 relative">
                    <!-- Línea conectora -->
                    <div class="hidden md:block absolute top-8 left-[16%] right-[16%] h-0.5 bg-gray-300 z-0"></div>

                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold shadow-lg mb-6 border-4 border-bg_system">1</div>
                        <h3 class="text-xl font-semibold mb-2">Busca tu sala</h3>
                        <p class="text-gray-600 font-light">Explora el catálogo visual y encuentra el espacio que mejor se adapte a tus necesidades.</p>
                    </div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold shadow-lg mb-6 border-4 border-bg_system">2</div>
                        <h3 class="text-xl font-semibold mb-2">Elige el horario</h3>
                        <p class="text-gray-600 font-light">Comprueba el calendario en tiempo real y selecciona la franja temporal libre.</p>
                    </div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold shadow-lg mb-6 border-4 border-bg_system">3</div>
                        <h3 class="text-xl font-semibold mb-2">¡Reserva lista!</h3>
                        <p class="text-gray-600 font-light">Confirma con un clic. La sala quedará bloqueada al instante para evitar dobles reservas.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========================================================================
             SECCIÓN RECUPERADA: CTA FINAL
             ========================================================================= -->
        <section class="bg-primary py-12 md:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between">
                <div class="text-center md:text-left mb-8 md:mb-0">
                    <h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">
                        ¿Listo para optimizar tus espacios?
                    </h2>
                    <p class="mt-4 text-lg text-indigo-200 font-light">
                        Únete a la plataforma y empieza a gestionar tus reservas hoy mismo de forma gratuita.
                    </p>
                </div>
                <div class="flex-shrink-0 w-full md:w-auto">
                    <a href="#" class="w-full md:w-auto flex items-center justify-center px-8 py-4 border border-transparent text-lg font-bold rounded-lg text-primary bg-white hover:bg-gray-50 shadow-xl transition-colors">
                        Crear cuenta gratis
                    </a>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-white border-t border-gray-200 py-8 text-center text-sm text-gray-500 font-light">
        <p>&copy; 2026 QuickSlot. Proyecto de Fin de Ciclo.</p>
    </footer>

    <script>
        const btnMenu = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        btnMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>