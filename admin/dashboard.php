<?php
require_once __DIR__ . '/includes/auth.php';
requireAdminLogin();
require_once __DIR__ . '/includes/db.php';

initializeDatabase();

$appointments = fetchAllRecords('appointments', 'created_at DESC');
$services = fetchAllRecords('services', 'id DESC');
$departments = fetchAllRecords('departments', 'id DESC');
$doctors = fetchAllRecords('doctors', 'id DESC');
$newsItems = fetchAllRecords('news', 'created_at DESC');

$serviceCount = count($services);
$departmentCount = count($departments);
$doctorCount = count($doctors);
$newsCount = count($newsItems);
$appointmentCount = count($appointments);
$pendingCount = count(array_filter($appointments, fn($item) => strtolower((string) ($item['status'] ?? 'pending')) === 'pending'));
$approvedCount = count(array_filter($appointments, fn($item) => strtolower((string) ($item['status'] ?? 'pending')) === 'approved'));
$recentAppointments = array_slice($appointments, 0, 5);
$latestServices = array_slice($services, 0, 4);
$latestDoctors = array_slice($doctors, 0, 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | SOShospital</title>
    <style>
        :root {
            --bg: #f3f7fb;
            --panel: #ffffff;
            --line: #dfe7f0;
            --text: #1b2430;
            --muted: #68717d;
            --primary: #0f4c81;
            --secondary: #1e6fb2;
            --success: #1d6d46;
            --warning: #8a6200;
            --danger: #9c2b2b;
            --shadow: 0 16px 32px rgba(15, 76, 129, 0.08);
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        a { text-decoration: none; }
        table { border-collapse: collapse; width: 100%; }
        th, td { text-align: left; padding: 12px 10px; }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 18px 28px;
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-badge {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(255,255,255,0.15);
            display: grid;
            place-items: center;
            font-weight: 700;
        }

        .topbar h2 { margin: 0; font-size: 1.2rem; }

        .admin-tools {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar a {
            color: white;
            font-weight: 700;
        }

        .sidebar-toggle {
            display: none;
            border: 1px solid rgba(255,255,255,0.4);
            background: transparent;
            color: white;
            border-radius: 10px;
            width: 42px;
            height: 42px;
            cursor: pointer;
        }

        .admin-layout {
            display: grid;
            grid-template-columns: 240px 1fr;
            min-height: calc(100vh - 74px);
        }

        .sidebar {
            background: #123a5e;
            color: #eaf4ff;
            padding: 20px 16px;
            border-right: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 10px;
        }

        .sidebar a {
            display: block;
            color: #eaf4ff;
            padding: 12px 14px;
            border-radius: 10px;
            background: rgba(255,255,255,0.05);
            transition: 0.2s ease;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.12);
        }

        .content {
            padding: 28px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 24px;
        }

        .page-header h1 {
            margin: 0;
            font-size: clamp(1.8rem, 3vw, 2.6rem);
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #eaf4ff;
            color: var(--primary);
            border-radius: 999px;
            padding: 8px 12px;
            font-weight: 700;
            font-size: 0.8rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card,
        .panel {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow);
        }

        .stat-card {
            padding: 20px;
        }

        .stat-card .label {
            color: var(--muted);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .stat-card .value {
            font-size: clamp(1.8rem, 2vw, 2.3rem);
            font-weight: 700;
            margin-top: 10px;
            color: var(--primary);
        }

        .section-grid {
            display: grid;
            grid-template-columns: 1.3fr 0.7fr;
            gap: 22px;
            margin-bottom: 22px;
        }

        .panel {
            padding: 22px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .panel-header h3 {
            margin: 0;
            font-size: 1.15rem;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .status-pending { background: #fff3d6; color: var(--warning); }
        .status-approved { background: #dff6e9; color: var(--success); }
        .status-declined { background: #fde6e6; color: var(--danger); }

        .table-wrap { overflow-x: auto; }
        table th {
            color: var(--muted);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-bottom: 1px solid var(--line);
        }

        table td {
            border-bottom: 1px solid var(--line);
            color: var(--text);
            vertical-align: top;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 8px;
        }

        .action-btn {
            display: block;
            background: #edf5ff;
            color: var(--primary);
            border: 1px solid #d7ebff;
            border-radius: 12px;
            padding: 14px 12px;
            text-align: center;
            font-weight: 700;
        }

        .mini-list {
            display: grid;
            gap: 12px;
        }

        .mini-item {
            padding: 12px 0;
            border-bottom: 1px solid var(--line);
        }

        .mini-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .mini-item strong {
            display: block;
            margin-bottom: 4px;
        }

        .mini-item small {
            color: var(--muted);
        }

        @media (max-width: 1080px) {
            .stats-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .section-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 780px) {
            .admin-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
                padding-top: 18px;
            }

            .sidebar.open {
                display: block;
            }

            .sidebar-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 540px) {
            .content { padding: 18px; }
            .topbar { padding: 14px 18px; }
            .stats-grid { grid-template-columns: 1fr; }
            .quick-actions { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="brand-wrap">
            <button class="sidebar-toggle" id="sidebarToggle" type="button" aria-label="Toggle sidebar">☰</button>
            <div class="brand-badge">SO</div>
            <h2>SOShospital CMS</h2>
        </div>
        <div class="admin-tools">
            <span class="pill">Admin mode</span>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <div class="admin-layout">
        <aside class="sidebar" id="adminSidebar">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="../index.php" target="_blank">View Website</a></li>
                <li><a href="services.php">Manage Services</a></li>
                <li><a href="departments.php">Manage Departments</a></li>
                <li><a href="doctors.php">Manage Doctors</a></li>
                <li><a href="appointments.php">Manage Appointments</a></li>
            </ul>
        </aside>

        <main class="content">
            <div class="page-header">
                <h1>Welcome back, Administrator</h1>
                <span class="pill">Updated: <?= date('M d, Y'); ?></span>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="label">Services</div>
                    <div class="value"><?= $serviceCount; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Departments</div>
                    <div class="value"><?= $departmentCount; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Doctors</div>
                    <div class="value"><?= $doctorCount; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Appointments</div>
                    <div class="value"><?= $appointmentCount; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Pending</div>
                    <div class="value"><?= $pendingCount; ?></div>
                </div>
            </div>

            <div class="section-grid">
                <section class="panel">
                    <div class="panel-header">
                        <h3>Recent appointment requests</h3>
                        <span class="pill"><?= $approvedCount; ?> approved</span>
                    </div>
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Department</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($recentAppointments)): ?>
                                    <tr>
                                        <td colspan="4">No appointments received yet.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($recentAppointments as $appointment): ?>
                                        <?php $status = strtolower((string) ($appointment['status'] ?? 'pending')); ?>
                                        <tr>
                                            <td>
                                                <strong><?= htmlspecialchars($appointment['patient_name'] ?? 'Unknown'); ?></strong><br>
                                                <small><?= htmlspecialchars($appointment['email'] ?? ''); ?></small>
                                            </td>
                                            <td><?= htmlspecialchars($appointment['department'] ?? 'General'); ?></td>
                                            <td><?= htmlspecialchars($appointment['preferred_date'] ?? 'Not set'); ?></td>
                                            <td>
                                                <span class="status-badge status-<?= $status; ?>"><?= ucfirst($status); ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-header">
                        <h3>Quick actions</h3>
                    </div>
                    <div class="quick-actions">
                        <a class="action-btn" href="services.php">Add Service</a>
                        <a class="action-btn" href="departments.php">Add Department</a>
                        <a class="action-btn" href="doctors.php">Add Doctor</a>
                        <a class="action-btn" href="appointments.php">View Appointments</a>
                    </div>
                    <div class="mini-list" style="margin-top: 22px;">
                        <div class="mini-item">
                            <strong>Latest service</strong>
                            <small><?= htmlspecialchars($latestServices[0]['name'] ?? 'No services listed'); ?></small>
                        </div>
                        <div class="mini-item">
                            <strong>Latest doctor</strong>
                            <small><?= htmlspecialchars($latestDoctors[0]['name'] ?? 'No doctors listed'); ?></small>
                        </div>
                    </div>
                </section>
            </div>

            <div class="section-grid">
                <section class="panel">
                    <div class="panel-header">
                        <h3>Hospital highlights</h3>
                    </div>
                    <div class="mini-list">
                        <?php foreach ($latestServices as $service): ?>
                            <div class="mini-item">
                                <strong><?= htmlspecialchars($service['name'] ?? 'Service'); ?></strong>
                                <small><?= htmlspecialchars($service['department'] ?? 'General'); ?> • <?= htmlspecialchars($service['hours'] ?? 'Flexible hours'); ?></small>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-header">
                        <h3>Medical team</h3>
                    </div>
                    <div class="mini-list">
                        <?php foreach ($latestDoctors as $doctor): ?>
                            <div class="mini-item">
                                <strong><?= htmlspecialchars($doctor['name'] ?? 'Dr. Unknown'); ?></strong>
                                <small><?= htmlspecialchars($doctor['specialty'] ?? 'General specialist'); ?> • <?= htmlspecialchars($doctor['department'] ?? 'General'); ?></small>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('adminSidebar');

            if (toggle && sidebar) {
                toggle.addEventListener('click', function () {
                    sidebar.classList.toggle('open');
                });
            }
        });
    </script>
</body>
</html>
