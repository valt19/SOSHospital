<?php
require_once __DIR__ . '/includes/auth.php';
requireAdminLogin();
require_once __DIR__ . '/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'update_status' && isset($_POST['id'])) {
        $fields = ['status' => $_POST['status'] ?? 'pending'];
        saveRecord('appointments', $fields, (int) $_POST['id']);
    }

    if ($action === 'delete' && isset($_POST['id'])) {
        deleteRecord('appointments', (int) $_POST['id']);
    }

    header('Location: appointments.php');
    exit;
}

$records = fetchAllRecords('appointments', 'created_at DESC');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments | SOShospital</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f3f7fb; font-family: Arial, sans-serif; margin: 0; color: #1b2430; }
        .admin-shell { max-width: 1180px; margin: 0 auto; padding: 32px 16px 60px; }
        .panel { background: white; border: 1px solid #dfe7f0; border-radius: 16px; box-shadow: 0 10px 22px rgba(15, 76, 129, 0.08); padding: 24px; margin-bottom: 24px; }
        .top-row { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 22px; }
        .btn { display: inline-block; border: none; border-radius: 999px; padding: 0.8rem 1.2rem; font-weight: 700; cursor: pointer; text-decoration: none; }
        .btn-secondary { background: #eaf4ff; color: #0f4c81; }
        select { width: 100%; padding: 0.8rem 0.9rem; border: 1px solid #dfe7f0; border-radius: 10px; font: inherit; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border-bottom: 1px solid #e7edf5; padding: 12px 10px; text-align: left; }
        .status { display: inline-block; padding: 6px 10px; border-radius: 999px; font-size: 0.8rem; font-weight: 700; }
        .pending { background: #fff4d5; color: #8a6200; }
        .approved { background: #dff6e9; color: #1d6d46; }
        .declined { background: #fee4e4; color: #9f2d2d; }
        .actions { display: flex; align-items: center; gap: 10px; }
    </style>
</head>
<body>
    <div class="admin-shell">
        <div class="top-row">
            <h1>Manage Appointments</h1>
            <a class="btn btn-secondary" href="dashboard.php">Back to dashboard</a>
        </div>

        <div class="panel">
            <h2>Appointment requests</h2>
            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td>
                                <strong><?= htmlspecialchars($record['patient_name'] ?? ''); ?></strong><br>
                                <small><?= htmlspecialchars($record['email'] ?? ''); ?></small>
                            </td>
                            <td><?= htmlspecialchars($record['department'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($record['preferred_date'] ?? ''); ?></td>
                            <td>
                                <?php $status = strtolower($record['status'] ?? 'pending'); ?>
                                <span class="status <?= htmlspecialchars($status); ?>"><?= ucfirst(htmlspecialchars($status)); ?></span>
                            </td>
                            <td class="actions">
                                <form method="post" style="display:flex; gap:8px; align-items:center;">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="id" value="<?= (int) $record['id']; ?>">
                                    <select name="status">
                                        <option value="pending" <?= $status === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="approved" <?= $status === 'approved' ? 'selected' : ''; ?>>Approved</option>
                                        <option value="declined" <?= $status === 'declined' ? 'selected' : ''; ?>>Declined</option>
                                    </select>
                                    <button class="btn btn-secondary" type="submit">Save</button>
                                </form>
                                <form method="post" style="display:inline; margin-left:8px;" onsubmit="return confirm('Delete this appointment?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?= (int) $record['id']; ?>">
                                    <button class="btn btn-secondary" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
