<?php
session_start();
require_once __DIR__ . '/includes/db.php';

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (verifyAdminCredentials($email, $password)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $email;
        header('Location: dashboard.php');
        exit;
    }

    $loginError = 'Invalid email or password.';
}

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | SOShospital</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0f4c81, #1e6fb2);
            display: grid;
            place-items: center;
            min-height: 100vh;
            color: #1b2430;
        }

        .login-box {
            width: min(420px, calc(100% - 32px));
            background: #fff;
            border-radius: 18px;
            padding: 32px 28px;
            box-shadow: 0 18px 45px rgba(11, 31, 52, 0.2);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 1.9rem;
            color: #0f4c81;
        }

        p {
            margin-top: 0;
            color: #68717d;
        }

        form {
            display: grid;
            gap: 16px;
        }

        label {
            font-weight: 700;
            display: grid;
            gap: 6px;
        }

        input {
            width: 100%;
            padding: 0.8rem 0.9rem;
            border: 1px solid #dfe7f0;
            border-radius: 10px;
            font: inherit;
        }

        button {
            border: none;
            background: #0f4c81;
            color: white;
            padding: 0.9rem 1.2rem;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
        }

        .error {
            background: #fff1f1;
            color: #9c2b2b;
            border: 1px solid #f5c4c4;
            border-radius: 10px;
            padding: 10px 12px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>SOShospital Admin</h1>
        <p>Sign in to manage website content.</p>

        <?php if (!empty($loginError)): ?>
            <div class="error"><?= htmlspecialchars($loginError); ?></div>
        <?php endif; ?>

        <form method="post">
            <label>
                Email
                <input type="email" name="email" value="admin@soshospital.com" required>
            </label>

            <label>
                Password
                <input type="password" name="password" value="admin123" required>
            </label>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
