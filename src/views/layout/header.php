<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickSlot</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>css/global.css">

    <?php if (isset($css) && is_array($css)): ?>
        <?php foreach ($css as $archivo): ?>
            <link rel="stylesheet" href="<?= BASE_URL ?>css/<?= $archivo ?>.css">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <header class="navbar">
        <div class="navbar-container">
            <a href="<?= BASE_URL ?>" class="logo-container">
                <svg class="logo-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="logo-text">QuickSlot</span>
            </a>

            <nav class="nav-desktop">
                <?php if (isset($_SESSION['id_usuario'])): ?>
                    <span class="user-welcome">Hola, <?= htmlspecialchars($_SESSION['nombre']) ?></span>
                    <a href="<?= BASE_URL ?>Cliente/panel" class="nav-link">Mi Panel</a>

                    <a href="<?= BASE_URL ?>Cliente/misReservas" class="nav-link">Mis Reservas</a>

                    <a href="<?= BASE_URL ?>Auth/logout" class="btn-logout">Salir</a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>Auth/login" class="nav-link">Iniciar Sesión</a>
                    <a href="<?= BASE_URL ?>Auth/registro" class="btn-primary" style="width: auto;">Regístrate</a>
                <?php endif; ?>
            </nav>

        </div>

        <div id="mobile-menu" class="nav-mobile-menu hidden">
            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="<?= BASE_URL ?>Cliente/panel" class="nav-link-mobile">Mi Panel</a>

                <a href="<?= BASE_URL ?>Cliente/misReservas" class="nav-link-mobile">Mis Reservas</a>

                <a href="<?= BASE_URL ?>Auth/logout" class="nav-link-mobile text-danger">Salir</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>Auth/login" class="nav-link-mobile">Iniciar Sesión</a>
                <a href="<?= BASE_URL ?>Auth/registro" class="btn-primary block text-center mt-2">Regístrate Gratis</a>
            <?php endif; ?>
        </div>
    </header>

    <main class="main-content">