<?php
$pageTitle = 'Home';
include __DIR__ . '/includes/header.php';
?>

<main>
    <section class="hero">
        <div class="hero-content">
            <span class="eyebrow">Compassionate care, modern medicine</span>
            <h1>Healthcare designed around your life.</h1>
            <p>
                SOShospital brings together expert clinicians, advanced facilities, and patient-first care to support healthier communities.
            </p>
            <div class="cta-row">
                <a class="btn btn-primary" href="appointments.php">Book an Appointment</a>
                <a class="btn btn-secondary" href="about.php">Learn More</a>
            </div>
            <ul class="hero-meta">
                <li>24/7 Emergency Services</li>
                <li>Experienced Specialists</li>
                <li>Patient-Centred Care</li>
            </ul>
        </div>
        <div class="hero-card">
            <div class="stat-pill">Open 24/7</div>
            <h3>Trusted care for every stage of life.</h3>
            <div class="mini-info">
                <div>
                    <strong>Emergency</strong>
                    <span>+234 (0)800 000 0000</span>
                </div>
                <div>
                    <strong>Hospital Hours</strong>
                    <span>Mon-Sun: 24 Hours</span>
                </div>
            </div>
        </div>
    </section>

    <section class="highlight-strip">
        <div>
            <strong>500+</strong>
            <span>Patients served daily</span>
        </div>
        <div>
            <strong>30+</strong>
            <span>Specialist doctors</span>
        </div>
        <div>
            <strong>12</strong>
            <span>Core departments</span>
        </div>
        <div>
            <strong>98%</strong>
            <span>Patient satisfaction</span>
        </div>
    </section>

    <section class="section">
        <div class="section-heading">
            <span class="eyebrow">Our services</span>
            <h2>Comprehensive medical care</h2>
        </div>
        <div class="card-grid">
            <?php foreach (array_slice($services, 0, 3) as $service): ?>
                <article class="card">
                    <div class="card-icon"><?= htmlspecialchars($service['icon']); ?></div>
                    <h3><?= htmlspecialchars($service['name']); ?></h3>
                    <p><?= htmlspecialchars($service['short_description']); ?></p>
                    <a href="services.php">Read more</a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section alt-bg">
        <div class="section-heading">
            <span class="eyebrow">Medical departments</span>
            <h2>Specialised care teams</h2>
        </div>
        <div class="dept-grid">
            <?php foreach (array_slice($departments, 0, 4) as $department): ?>
                <div class="dept-item">
                    <h3><?= htmlspecialchars($department['name']); ?></h3>
                    <p><?= htmlspecialchars($department['summary']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="section-heading">
            <span class="eyebrow">Our doctors</span>
            <h2>Meet the care team</h2>
        </div>
        <div class="doctor-grid">
            <?php foreach (array_slice($doctors, 0, 3) as $doctor): ?>
                <article class="doctor-card">
                    <div class="doctor-photo"><?= htmlspecialchars(substr($doctor['name'], 0, 2)); ?></div>
                    <h3><?= htmlspecialchars($doctor['name']); ?></h3>
                    <p class="role"><?= htmlspecialchars($doctor['specialty']); ?></p>
                    <p><?= htmlspecialchars($doctor['bio']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section alt-bg">
        <div class="section-heading">
            <span class="eyebrow">Health updates</span>
            <h2>Latest news and information</h2>
        </div>
        <div class="news-grid">
            <?php foreach (array_slice($news, 0, 3) as $item): ?>
                <article class="news-card">
                    <span><?= htmlspecialchars($item['date']); ?></span>
                    <h3><?= htmlspecialchars($item['title']); ?></h3>
                    <p><?= htmlspecialchars($item['excerpt']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="cta-banner">
        <div>
            <span class="eyebrow">Need medical help?</span>
            <h2>Book a consultation or speak to our care team today.</h2>
        </div>
        <a class="btn btn-primary" href="appointments.php">Make an appointment</a>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
