<section class="auth-box">
    
    <h2 class="auth-title">Acceso a QuickSlot</h2>

    <?php if (isset($error)): ?>
        <div class="alert-error">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>Auth/procesarLogin" method="POST">
        
        <div class="form-group">
            <label>Correo Electrónico:</label>
            <input type="email" name="email" class="form-input" required placeholder="tu@correo.com">
        </div>
        
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-input" required placeholder="Tu contraseña">
        </div>
        
        <div class="form-group" style="margin-top: 1.5rem;">
            <button type="submit" class="btn-primary">Entrar</button>
        </div>
    </form>

    <div class="auth-footer">
        ¿No tienes cuenta? <a href="<?= BASE_URL ?>Auth/registro" class="auth-link">Regístrate aquí</a>
    </div>

</section>