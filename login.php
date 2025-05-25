<?php
session_start();
include('./encode.php');
if (!isset($_SESSION['cat']) || $_SESSION['cat'] === false) {
    header("Location: ./index.php");
    exit();
}

// Handle login form submission
if (isset($_POST['login'])) {
    $usr = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');

    if (!empty($usr) && !empty($pwd)) {
        // Hardcoded credential check
        if ($usr === 'oiiacat_ethel' && $pwd === 'coolcat') {
            $key = "secret_key_" . rand(100000, 999999);
            $data = '{"username":"' . $usr . '","role":"user","key":"' . $key . '"}';

            $customSessionID = custom_encrypt($data, $key);

            session_id($customSessionID);

            $_SESSION['username'] = $usr;

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
                <!--Feel free to follow me on Instagram, until then oiia oiia...-->
    </div>
</body>
</html>
