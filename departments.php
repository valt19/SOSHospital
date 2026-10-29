<?php
$pageTitle = 'Departments';
include __DIR__ . '/includes/header.php';
?>

<main class="page-shell">
    <section class="page-hero small-hero">
        <div class="container narrow">
            <span class="eyebrow">Departments</span>
            <h1>Specialised departments for every stage of care.</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="container dept-list">
            <?php foreach ($departments as $department): ?>
                <article class="department-item">
                    <div>
                        <span class="eyebrow">Department</span>
                        <h3><?= htmlspecialchars($department['name']); ?></h3>
                    </div>
                    <p><?= htmlspecialchars($department['summary']); ?></p>
                    <ul>
                        <li><strong>Location:</strong> <?= htmlspecialchars($department['location']); ?></li>
                        <li><strong>Hours:</strong> <?= htmlspecialchars($department['hours']); ?></li>
                        <li><strong>Services:</strong> <?= htmlspecialchars($department['services']); ?></li>
                    </ul>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
