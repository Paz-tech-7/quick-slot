<section class="welcome-box" style="margin-bottom: 2rem;">
    <h1>Bienvenido a tu panel, <?= htmlspecialchars($nombre) ?></h1>
    <p class="text-muted">Aquí tienes las salas disponibles para reservar hoy.</p>
</section>

<section class="search-section">
    <h2>Buscar disponibilidad</h2>
    <form class="form-grid">
        <div class="form-group">
            <label>Fecha</label>
            <input type="date" class="form-input">
        </div>
        <div class="form-group">
            <label>Horario</label>
            <select class="form-input">
                <option>Mañana (08:00 - 14:00)</option>
                <option>Tarde (14:00 - 20:00)</option>
            </select>
        </div>
        <div class="form-group">
            <button type="button" class="btn-primary">Buscar Salas</button>
        </div>
    </form>
</section>

<?php
// Filtramos el arreglo: solo nos quedamos con las salas cuyo estado sea 'disponible'
$salasLibres = array_filter($salas, function ($sala) {
    return $sala->estado === 'disponible';
});
?>

<h3 class="rooms-header">Salas disponibles (<?= count($salasLibres) ?>)</h3>

<section class="rooms-grid">

    <?php foreach ($salas as $sala): ?>

        <article class="card">

            <div class="card-body">
                <div class="card-title-row">
                    <h3 class="rooms-header"><?= htmlspecialchars($sala->nombre) ?></h3>

                    <?php if ($sala->estado === 'disponible'): ?>
                        <span class="badget badget--success">Disponible</span>
                    <?php elseif ($sala->estado === 'mantenimiento'): ?>
                        <span class="badget badget--maintenance">En mantenimiento</span>
                    <?php else: ?>
                        <span class="badget badget--unavailable">Ocupada</span>
                    <?php endif; ?>
                </div>

                <p class="card-desc">
                    <?= htmlspecialchars($sala->descripcion) ?>
                </p>

                <div class="card-info">
                    👥 Aforo: <?= htmlspecialchars($sala->aforo) ?> personas
                </div>
            </div>

            <div class="card-footer">
                <?php if ($sala->estado === 'disponible'): ?>
                    <a href="<?= BASE_URL ?>Reserva/solicitar/<?= $sala->id_sala ?>" class="btn-outline btn--reserve">
                        Reservar Sala
                    </a>
                <?php else: ?>
                    <button class="btn-outline" disabled style="opacity: 0.5; cursor: not-allowed; width: 100%;">
                        No Disponible
                    </button>
                <?php endif; ?>
            </div>

        </article>

    <?php endforeach; ?>

</section>