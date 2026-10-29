<?php
$pageTitle = 'Contact';
include __DIR__ . '/includes/header.php';
?>

<main class="page-shell">
    <section class="page-hero small-hero">
        <div class="container narrow">
            <span class="eyebrow">Contact us</span>
            <h1>Reach our care team anytime.</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="container contact-layout">
            <div class="info-box">
                <h3>Hospital details</h3>
                <p>123 Health Avenue, City Centre, Lagos</p>
                <p>Phone: +234 (0)800 000 0000</p>
                <p>Email: hello@soshospital.com</p>
                <p>Emergency: +234 (0)800 111 2222</p>
            </div>

            <form class="contact-form">
                <div class="form-row">
                    <label>Full name</label>
                    <input type="text" placeholder="Your name" />
                </div>
                <div class="form-row">
                    <label>Email address</label>
                    <input type="email" placeholder="you@example.com" />
                </div>
                <div class="form-row">
                    <label>Message</label>
                    <textarea rows="5" placeholder="How can we help?"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Send message</button>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
