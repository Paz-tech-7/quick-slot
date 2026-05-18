<section class="auth-box">
    <h2 class="auth-title">Configurar tu Reserva</h2>
    
    <?php if (isset($error)): ?>
        <div class="alert-error">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>Reserva/procesar" method="POST">
        
        <input type="hidden" name="sala_id" value="<?= $sala_id ?>">

        <div class="form-group">
            <label>Fecha de la reserva:</label>
            <input type="date" name="fecha" class="form-input" required min="<?= date('Y-m-d') ?>">
        </div>

        <div class="form-group">
            <label>Hora de Inicio:</label>
            <input type="time" name="hora_inicio" class="form-input" required>
        </div>

        <div class="form-group">
            <label>Hora de Finalización:</label>
            <input type="time" name="hora_fin" class="form-input" required>
        </div>

        <div class="form-group" style="margin-top: 2rem;">
            <button type="submit" class="btn-primary">Confirmar y Bloquear Sala</button>
        </div>
    </form>

    <div class="auth-footer">
        <a href="<?= BASE_URL ?>Cliente/panel" class="auth-link">Volver al catálogo</a>
    </div>
</section>