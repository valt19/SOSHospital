<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/database.php';

function initializeDatabase(): ?mysqli
{
    try {
        $connection = getDbConnection();

        $schemaFile = __DIR__ . '/../../database/schema.sql';
        if (file_exists($schemaFile)) {
            $schema = file_get_contents($schemaFile);
            if ($schema !== false && trim($schema) !== '') {
                if ($connection->multi_query($schema)) {
                    do {
                        if ($result = $connection->store_result()) {
                            $result->free();
                        }
                    } while ($connection->next_result());
                }
            }
        }

        ensureDefaultAdmin($connection);

        return $connection;
    } catch (Throwable $e) {
        error_log('Database initialization failed: ' . $e->getMessage());
        return null;
    }
}

function ensureDefaultAdmin(mysqli $connection): void
{
    $email = 'admin@soshospital.com';
    $hash = password_hash('admin123', PASSWORD_BCRYPT);

    $stmt = $connection->prepare('INSERT INTO admins (full_name, email, password_hash) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE email = email');
    if ($stmt === false) {
        return;
    }

    $stmt->bind_param('sss', $fullName, $email, $hash);
    $fullName = 'System Administrator';
    $stmt->execute();
    $stmt->close();
}

function verifyAdminCredentials(string $email, string $password): bool
{
    $email = trim($email);
    $conn = initializeDatabase();

    if (!$conn) {
        return $email === 'admin@soshospital.com' && $password === 'admin123';
    }

    $stmt = $conn->prepare('SELECT password_hash FROM admins WHERE email = ? LIMIT 1');
    if ($stmt === false) {
        return $email === 'admin@soshospital.com' && $password === 'admin123';
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if (!$row || empty($row['password_hash'])) {
        return $email === 'admin@soshospital.com' && $password === 'admin123';
    }

    return password_verify($password, $row['password_hash']);
}

function fetchAllRecords(string $table, string $order = 'id DESC'): array
{
    $connection = initializeDatabase();
    if (!$connection) {
        $source = __DIR__ . '/../data/site_data.php';
        if (file_exists($source)) {
            require $source;
            $map = [
                'services' => $services ?? [],
                'departments' => $departments ?? [],
                'doctors' => $doctors ?? [],
                'news' => $news ?? [],
                'appointments' => [],
            ];

            return $map[$table] ?? [];
        }

        return [];
    }

    $result = $connection->query('SELECT * FROM ' . $connection->real_escape_string($table) . ' ORDER BY ' . $order);
    if ($result === false) {
        return [];
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

function countTableRecords(string $table): int
{
    $connection = initializeDatabase();
    if (!$connection) {
        return 0;
    }

    $result = $connection->query('SELECT COUNT(*) FROM `' . $table . '`');
    if ($result === false) {
        return 0;
    }

    $row = $result->fetch_row();
    return (int) ($row[0] ?? 0);
}

function fetchRecentAppointments(int $limit = 5): array
{
    $connection = initializeDatabase();
    if (!$connection) {
        return [];
    }

    $stmt = $connection->prepare('SELECT * FROM appointments ORDER BY created_at DESC LIMIT ?');
    if ($stmt === false) {
        return [];
    }

    $stmt->bind_param('i', $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $data;
}

function saveRecord(string $table, array $fields, ?int $id = null): bool
{
    $connection = initializeDatabase();
    if (!$connection) {
        return false;
    }

    if ($id !== null) {
        $set = [];
        $values = [];
        $types = '';

        foreach ($fields as $column => $value) {
            $set[] = sprintf('`%s` = ?', $column);
            $values[] = $value;
            $types .= 's';
        }

        $sql = sprintf('UPDATE `%s` SET %s WHERE id = ?', $table, implode(', ', $set));
        $stmt = $connection->prepare($sql);
        if ($stmt === false) {
            return false;
        }

        $params = array_merge([$types . 'i'], $values, [$id]);
        $stmt->bind_param(...$params);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    $columns = implode(', ', array_map(fn($column) => '`' . $column . '`', array_keys($fields)));
    $placeholders = implode(', ', array_fill(0, count($fields), '?'));
    $types = str_repeat('s', count($fields));

    $sql = sprintf('INSERT INTO `%s` (%s) VALUES (%s)', $table, $columns, $placeholders);
    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        return false;
    }

    $values = array_values($fields);
    $stmt->bind_param($types, ...$values);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function deleteRecord(string $table, int $id): bool
{
    $connection = initializeDatabase();
    if (!$connection) {
        return false;
    }

    $stmt = $connection->prepare('DELETE FROM `' . $table . '` WHERE id = ?');
    if ($stmt === false) {
        return false;
    }

    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
