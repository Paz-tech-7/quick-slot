<section class="auth-box">
    
    <h2 class="auth-title">Crear una cuenta en QuickSlot</h2>

    <?php if (isset($error)): ?>
        <div class="alert-error">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>Auth/procesarRegistro" method="POST">
        
        <div class="form-group">
            <label>Nombre Completo:</label>
            <input type="text" name="nombre" class="form-input" required placeholder="Ej: Carlos López">
        </div>

        <div class="form-group">
            <label>Correo Electrónico:</label>
            <input type="email" name="email" class="form-input" required placeholder="tucorreo@ejemplo.com">
        </div>
        
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-input" required placeholder="Mínimo 6 caracteres">
        </div>
        
        <div class="form-group" style="margin-top: 1.5rem;">
            <button type="submit" class="btn-primary">Registrarme</button>
        </div>
    </form>
    
    <div class="auth-footer">
        ¿Ya tienes cuenta? <a href="<?= BASE_URL ?>Auth/login" class="auth-link">Inicia sesión aquí</a>
    </div>

</section>