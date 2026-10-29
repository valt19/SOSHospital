<?php
$pageTitle = 'Services';
include __DIR__ . '/includes/header.php';
?>

<main class="page-shell">
    <section class="page-hero small-hero">
        <div class="container narrow">
            <span class="eyebrow">Medical services</span>
            <h1>Care pathways tailored to patient needs.</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="card-grid service-grid">
                <?php foreach ($services as $service): ?>
                    <article class="card">
                        <div class="card-icon"><?= htmlspecialchars($service['icon']); ?></div>
                        <h3><?= htmlspecialchars($service['name']); ?></h3>
                        <p><?= htmlspecialchars($service['short_description']); ?></p>
                        <ul class="service-meta">
                            <li><?= htmlspecialchars($service['department']); ?></li>
                            <li><?= htmlspecialchars($service['hours']); ?></li>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
