<?php
require_once __DIR__ . '/includes/auth.php';
requireAdminLogin();
require_once __DIR__ . '/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'save') {
        $fields = [
            'name' => $_POST['name'] ?? '',
            'specialty' => $_POST['specialty'] ?? '',
            'department' => $_POST['department'] ?? '',
            'experience' => $_POST['experience'] ?? '',
            'bio' => $_POST['bio'] ?? '',
        ];

        $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int) $_POST['id'] : null;
        saveRecord('doctors', $fields, $id);
    }

    if ($action === 'delete' && isset($_POST['id'])) {
        deleteRecord('doctors', (int) $_POST['id']);
    }

    header('Location: doctors.php');
    exit;
}

$records = fetchAllRecords('doctors');
$editing = null;
if (isset($_GET['edit'])) {
    foreach ($records as $record) {
        if ((int) $record['id'] === (int) $_GET['edit']) {
            $editing = $record;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors | SOShospital</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f3f7fb; font-family: Arial, sans-serif; margin: 0; color: #1b2430; }
        .admin-shell { max-width: 1180px; margin: 0 auto; padding: 32px 16px 60px; }
        .panel { background: white; border: 1px solid #dfe7f0; border-radius: 16px; box-shadow: 0 10px 22px rgba(15, 76, 129, 0.08); padding: 24px; margin-bottom: 24px; }
        .top-row { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 22px; }
        .btn { display: inline-block; border: none; border-radius: 999px; padding: 0.8rem 1.2rem; font-weight: 700; cursor: pointer; text-decoration: none; }
        .btn-primary { background: #0f4c81; color: white; }
        .btn-secondary { background: #eaf4ff; color: #0f4c81; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
        .field { display: grid; gap: 8px; }
        label { font-weight: 700; }
        input, textarea { width: 100%; padding: 0.8rem 0.9rem; border: 1px solid #dfe7f0; border-radius: 10px; font: inherit; }
        textarea { min-height: 110px; resize: vertical; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border-bottom: 1px solid #e7edf5; padding: 12px 10px; text-align: left; }
        .actions a, .actions button { margin-right: 8px; }
    </style>
</head>
<body>
    <div class="admin-shell">
        <div class="top-row">
            <h1>Manage Doctors</h1>
            <a class="btn btn-secondary" href="dashboard.php">Back to dashboard</a>
        </div>

        <div class="panel">
            <h2><?= $editing ? 'Edit doctor' : 'Add new doctor'; ?></h2>
            <form method="post">
                <input type="hidden" name="action" value="save">
                <?php if ($editing): ?>
                    <input type="hidden" name="id" value="<?= (int) $editing['id']; ?>">
                <?php endif; ?>
                <div class="form-grid">
                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= htmlspecialchars($editing['name'] ?? ''); ?>" required>
                    </div>
                    <div class="field">
                        <label>Specialty</label>
                        <input type="text" name="specialty" value="<?= htmlspecialchars($editing['specialty'] ?? ''); ?>">
                    </div>
                    <div class="field">
                        <label>Department</label>
                        <input type="text" name="department" value="<?= htmlspecialchars($editing['department'] ?? ''); ?>">
                    </div>
                    <div class="field">
                        <label>Experience</label>
                        <input type="text" name="experience" value="<?= htmlspecialchars($editing['experience'] ?? ''); ?>">
                    </div>
                    <div class="field" style="grid-column: 1 / -1;">
                        <label>Bio</label>
                        <textarea name="bio" required><?= htmlspecialchars($editing['bio'] ?? ''); ?></textarea>
                    </div>
                </div>
                <div style="margin-top: 18px;">
                    <button class="btn btn-primary" type="submit"><?= $editing ? 'Update doctor' : 'Create doctor'; ?></button>
                    <?php if ($editing): ?>
                        <a class="btn btn-secondary" href="doctors.php">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="panel">
            <h2>Current doctors</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Specialty</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= htmlspecialchars($record['name']); ?></td>
                            <td><?= htmlspecialchars($record['specialty'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($record['department'] ?? ''); ?></td>
                            <td class="actions">
                                <a class="btn btn-secondary" href="doctors.php?edit=<?= (int) $record['id']; ?>">Edit</a>
                                <form method="post" style="display:inline;" onsubmit="return confirm('Delete this doctor?');">
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
