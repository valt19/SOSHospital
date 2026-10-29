<?php
$pageTitle = 'Health News';
include __DIR__ . '/includes/header.php';
?>

<main class="page-shell">
    <section class="page-hero small-hero">
        <div class="container narrow">
            <span class="eyebrow">Health information</span>
            <h1>News and wellness resources.</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="container news-list">
            <?php foreach ($news as $item): ?>
                <article class="news-card full-width">
                    <span><?= htmlspecialchars($item['date']); ?></span>
                    <h3><?= htmlspecialchars($item['title']); ?></h3>
                    <p><?= htmlspecialchars($item['excerpt']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
