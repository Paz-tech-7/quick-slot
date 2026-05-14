<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickSlot</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/styles.css">
</head>

<body>
    <header class="navbar">
        <div class="logo-container">
            <svg class="logo-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="logo-text">QuickSlot</span>
        </div>

        <nav class="nav-links">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <span class="user-welcome">Hola, <?= $_SESSION['nombre'] ?></span>
                <a href="<?= BASE_URL ?>Auth/logout" class="btn-logout">Salir</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>Auth/login">Entrar</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="container">