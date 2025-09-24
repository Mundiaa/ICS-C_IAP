<?php
// Signup.php

// Load autoloader and configs
require_once 'Autoloader.php';
require_once 'config.php';

$format->header($conf);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    // Collect form data
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validate input
    $errors = [];
    if (empty($username)) $errors[] = "Username is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";

    if (empty($errors)) {
        try {
            // Connect to DB
            $dsn = "{$config['db_type']}:host={$config['db_host']};dbname={$config['db_name']};charset=utf8mb4";
            $pdo = new PDO($dsn, $config['db_user'], $config['db_pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            // Check if email already exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            if ($stmt->fetch()) {
                echo "<p style='color:red;'>Email already registered.</p>";
            } else {
                // Insert new user
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                $stmt->execute([
                    'username' => $username,
                    'email'    => $email,
                    'password' => $hashedPassword
                ]);

                echo "<p style='color:green;'>Signup successful! Welcome, $username 🎉</p>";

                // Send welcome email
                $mailData = [
                    'from' => $conf['admin_email'],
                    'from_name' => $conf['site_name'],
                    'to' => $email,
                    'to_name' => $username,
                    'subject' => "Welcome to {$conf['site_name']}",
                    'body' => "<h2>Hello $username,</h2><p>Welcome to {$conf['site_name']}! Your account has been created successfully.</p>"
                ];
                $ObjSendMail->Send_Mail($emailConfig, $mailData);
            }
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}

// Show signup form again
$index->signup();

$format->footer($conf);
