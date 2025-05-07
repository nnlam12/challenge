<?php
session_start();

if (!isset($_SESSION['cat']) || $_SESSION['cat'] === false) {
    header("Location: ./index.php");
    exit();
}

include("./configdb.php");
include("./encode.php");

try {
    // Establish database connection
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}

// Handle login form submission
if (isset($_POST['login'])) {
    $usr = trim($_POST['username']);
    $pwd = trim($_POST['password']);

    if (!empty($usr) && !empty($pwd)) {
        // Use prepared statements for security
        $stmt = $db->prepare("SELECT * FROM $table_name_user WHERE username = :username AND password = :password");
        $stmt->execute([
            ':username' => $usr,
            ':password' => $pwd
        ]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $key = "secret_key_" . rand(100000, 999999);
            $data = '{"username":"' . $user['nom'] . '","role":"' . $user['role'] . '","key":"' . $key . '"}';
            $dataAdmin = '{"username":"olivier","role":"admin","key":"' . $key . '"}';

            $customSessionID = custom_encrypt($data, $key);
            $adminSessionID = custom_encrypt($dataAdmin, $key);

            session_id($customSessionID);
            session_start();

            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];

            header("Location: ./dashboard.php");
            exit();
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "Please fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="./backgrounds/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="./style.css"/>
    <style>
        body {
            background: url('./backgrounds/submarine.gif') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="form-container" style="flex-direction: column; align-items: center;">
            <div class="form">
                <form class="login-form" method="POST">
                    <input type="text" name="username" placeholder="user_name" />
                    <input type="password" name="password" placeholder="password" />
                    <button name="login">login</button>
                    <p class="message">Not registered? <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Create an account</a></p>
                    <p class="message">Forgot your password? <a href="https://www.youtube.com/watch?v=cs-kPAMfc2Y">Reset it</a></p>
                </form>
            </div>
            <img src="./backgrounds/oia-uia.gif" alt="OIA UIA Animation" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); margin-top: 20px;">
        </div>
    </div>
</body>
</html>
