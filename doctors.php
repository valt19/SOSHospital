<?php
$pageTitle = 'Doctors';
include __DIR__ . '/includes/header.php';
?>

<main class="page-shell">
    <section class="page-hero small-hero">
        <div class="container narrow">
            <span class="eyebrow">Medical team</span>
            <h1>Experienced doctors supporting patient wellness.</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="container doctor-grid">
            <?php foreach ($doctors as $doctor): ?>
                <article class="doctor-card large">
                    <div class="doctor-photo"><?= htmlspecialchars(substr($doctor['name'], 0, 2)); ?></div>
                    <h3><?= htmlspecialchars($doctor['name']); ?></h3>
                    <p class="role"><?= htmlspecialchars($doctor['specialty']); ?></p>
                    <p><?= htmlspecialchars($doctor['bio']); ?></p>
                    <ul>
                        <li><strong>Department:</strong> <?= htmlspecialchars($doctor['department']); ?></li>
                        <li><strong>Experience:</strong> <?= htmlspecialchars($doctor['experience']); ?></li>
                    </ul>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
