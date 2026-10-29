<?php

$dbHost = getenv('DB_HOST') ?: 'localhost';
$dbName = getenv('DB_NAME') ?: 'soshospital';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS') ?: '';

function connectToServer()
{
    global $dbHost, $dbUser, $dbPass;

    $connection = new mysqli($dbHost, $dbUser, $dbPass);

    if ($connection->connect_error) {
        throw new RuntimeException('Database server connection failed: ' . $connection->connect_error);
    }

    return $connection;
}

function getDbConnection()
{
    global $dbHost, $dbName, $dbUser, $dbPass;

    $connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($connection->connect_error) {
        $serverConnection = connectToServer();
        $serverConnection->query("CREATE DATABASE IF NOT EXISTS `{$dbName}`");
        $serverConnection->close();

        $connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($connection->connect_error) {
            throw new RuntimeException('Database connection failed: ' . $connection->connect_error);
        }
    }

    return $connection;
}
