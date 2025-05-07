<?php
session_start();

// Redirect to login if the user is not authenticated
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}

$mess = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the input
    $code = htmlspecialchars(trim($_POST['title']), ENT_QUOTES, 'UTF-8');

    if (!empty($code)) {
        // Validate the code
        if ($code === "oiiai") { 
           $_SESSION['success'] = true;
           header("Location: success.php");
           exit();
        } else {
            $mess = "Incorrect code. Try again.";
        }
    } else {
        $mess = "Code cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prison Lock</title>
    <link rel="icon" href="../backgrounds/favicon.ico" type="image/x-icon">
    <style>
        body {
            background: url('../backgrounds/lock.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color:rgb(85, 85, 85);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
            display: flex;
            align-items: center;
            flex-direction: column;
            
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            padding: 8px;
            width: 50%;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color:rgb(78, 76, 175);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:rgb(69, 90, 160);
        }
        .message {
            margin-top: 20px;
            font-size: 1.2em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color: white; padding-bottom: 6px;">The king has hidden the key somewhere</h1>

        <form action="prison_lock.php" method="POST" enctype="multipart/form-data">
            <label for="title" style="color: white;">Code:</label><br>
            <input type="text" id="title" name="title" required><br>
            <input type="submit" value="Open">
        </form>
        <form action="./index.php" method="GET">
            <input type="submit" value="Return" style="margin-top: 10px; background-color: gray; color: white; border: none; border-radius: 4px; padding: 10px 20px; cursor: pointer;">
        </form>

        <div class="message">
            <?php echo $mess; ?>
        </div>
    </div>
</body>
</html>
