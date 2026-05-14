<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - QuickSlot</title>
</head>
<body>
    <h2>Acceso a QuickSlot</h2>

    <!-- Bloque para mostrar errores si el usuario se equivoca -->
    <?php if (isset($error)): ?>
        <p style="color: red; font-weight: bold;"><?= $error ?></p>
    <?php endif; ?>

    <!-- EL FORMULARIO CLAVE -->
    <form action="<?= BASE_URL ?>Auth/procesarLogin" method="POST">
        <div>
            <label>Correo Electrónico:</label>
            <!-- El atributo name="email" es vital porque PHP buscará $_POST['email'] -->
            <input type="email" name="email" required>
        </div>
        
        <div>
            <label>Contraseña:</label>
            <!-- El atributo name="password" es vital porque PHP buscará $_POST['password'] -->
            <input type="password" name="password" required>
        </div>
        
        <button type="submit">Entrar</button>
    </form>
</body>
</html>