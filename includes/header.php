<?php
require_once __DIR__ . '/../data/site_data.php';

$currentPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$navItems = [
    ['label' => 'Home', 'path' => 'index.php'],
    ['label' => 'About', 'path' => 'about.php'],
    ['label' => 'Services', 'path' => 'services.php'],
    ['label' => 'Departments', 'path' => 'departments.php'],
    ['label' => 'Doctors', 'path' => 'doctors.php'],
    ['label' => 'Appointments', 'path' => 'appointments.php'],
    ['label' => 'Health News', 'path' => 'news.php'],
    ['label' => 'Contact', 'path' => 'contact.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'SOShospital'); ?> | SOShospital</title>
    <meta name="description" content="SOShospital offers compassionate, modern healthcare services and patient-focused support.">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="topbar">
            <div class="container">
                <span>Emergency: +234 (0)800 111 2222</span>
                <span>Open 24/7 • Appointments available daily</span>
            </div>
        </div>

        <nav class="navbar container" aria-label="Main navigation">
            <a class="brand" href="index.php" aria-label="SOShospital home">
                <span class="brand-mark">SO</span>
                <span>SOShospital</span>
            </a>

            <button class="nav-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-menu">
                <?php foreach ($navItems as $item): ?>
                    <?php $isActive = basename($item['path']) === $currentPage; ?>
                    <li>
                        <a href="<?= htmlspecialchars($item['path']); ?>" class="<?= $isActive ? 'active' : ''; ?>"><?= htmlspecialchars($item['label']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
