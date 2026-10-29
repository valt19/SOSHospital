<?php
$pageTitle = 'Appointments';
include __DIR__ . '/includes/header.php';
?>

<main class="page-shell">
    <section class="page-hero small-hero">
        <div class="container narrow">
            <span class="eyebrow">Appointments</span>
            <h1>Book a consultation with SOShospital.</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="container form-shell">
            <form class="contact-form">
                <div class="form-row">
                    <label>Full name</label>
                    <input type="text" placeholder="Patient name" />
                </div>
                <div class="form-row two-up">
                    <div>
                        <label>Email</label>
                        <input type="email" placeholder="Email address" />
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="tel" placeholder="Phone number" />
                    </div>
                </div>
                <div class="form-row two-up">
                    <div>
                        <label>Department</label>
                        <select>
                            <option>General Consultation</option>
                            <option>Pediatrics</option>
                            <option>Cardiology</option>
                            <option>Orthopedics</option>
                        </select>
                    </div>
                    <div>
                        <label>Preferred date</label>
                        <input type="date" />
                    </div>
                </div>
                <div class="form-row">
                    <label>Reason for visit</label>
                    <textarea rows="4" placeholder="Briefly describe your concern"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Request appointment</button>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
