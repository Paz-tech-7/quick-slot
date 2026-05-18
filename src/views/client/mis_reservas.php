<section class="welcome-box" style="margin-bottom: 2rem;">
    <h1>Mi Historial de Reservas</h1>
    <p class="text-muted">Consulta aquí todas tus citas programadas y pasadas.</p>
</section>

<section class="rooms-grid">

    <?php if (empty($reservas)): ?>
        <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: var(--white); border-radius: 0.75rem; border: 1px solid var(--border);">
            <p class="text-muted" style="font-size: 1.125rem;">Aún no tienes ninguna reserva activa.</p>
            <a href="<?= BASE_URL ?>Cliente/panel" class="btn-primary" style="display: inline-block; margin-top: 1rem; text-decoration: none;">Explorar Salas</a>
        </div>
    <?php else: ?>

        <?php foreach ($reservas as $reserva): ?>
            <article class="card">
                <div class="card-body">
                    <div class="card-title-row">
                        <h3 class="rooms-header"><?= htmlspecialchars($reserva->nombre_sala) ?></h3>

                        <?php if ($reserva->estado === 'activa'): ?>
                            <span class="badget badget--success">Activa</span>
                        <?php elseif ($reserva->estado === 'cancelada'): ?>
                            <span class="badget badget--unavailable" style="background-color: #fee2e2; color: #991b1b;">Cancelada</span>
                        <?php else: ?>
                            <span class="badget" style="background-color: #f3f4f6; color: #374151;">Completada</span>
                        <?php endif; ?>
                    </div>

                    <p class="card-desc" style="font-weight: bold; color: var(--text-main); margin-bottom: 0.5rem;">
                        📅 Fecha: <?= date('d/m/Y', strtotime($reserva->fecha_reserva)) ?>
                    </p>
                    <div class="card-info" style="margin-bottom: 1rem;">
                        ⏰ Horario: <?= date('H:i', strtotime($reserva->hora_inicio)) ?> - <?= date('H:i', strtotime($reserva->hora_fin)) ?>
                    </div>
                </div>

                <div class="card-footer">
                    <?php if ($reserva->estado === 'activa'): ?>
                        
                        <a href="<?= BASE_URL ?>Reserva/cancelar/<?= $reserva->id_reserva ?>" 
                           class="btn-outline" 
                           style="color: #dc2626; border-color: #dc2626; width: 100%; text-decoration: none; display: block; text-align: center; box-sizing: border-box;"
                           onclick="return confirm('¿Estás totalmente seguro de que deseas cancelar esta reserva?');">
                            Cancelar Reserva
                        </a>

                    <?php else: ?>
                        <button class="btn-outline" disabled style="opacity: 0.5; width: 100%;">Finalizada</button>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>

    <?php endif; ?>

</section>