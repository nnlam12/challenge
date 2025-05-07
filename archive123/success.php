<?php
session_start();

// Redirect to login if the user is not authenticated
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}
if (!isset($_SESSION['success'])) {
    header("Location: ./prison_lock.php");
    exit();
}
$mess = "<br><br><br><br><br><br><br><br><br>";

$mess .= "Congratulations! You have successfully reached the end of CaTF. Stay tuned for more challenges and thanks for playing!<br>";
$mess .= "<br>###########################################<br>";
$mess .= "#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FLAG: CATF{K1TTY_35C4P3D}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
$mess .= "###########################################<br>";
$mess .= '<div style="display: flex; justify-content: center; align-items: center; margin-top: 300px;">
<img src="../backgrounds/happi.gif" alt="happi" style="max-width: 100%; height: auto;">
<img src="../backgrounds/oia-uia.gif" alt="oia" style="max-width: 100%; height: auto;">

</div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congrats</title>
    <link rel="icon" href="../backgrounds/favicon.ico" type="image/x-icon">
    <style>
        body {
            background: url('../backgrounds/fish_kingdom.png') no-repeat center center fixed;
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
            color: #ff0;
            text-align: center;
            shadow: 2px 2px 10px #000;
        }
    </style>
</head>
<body>

        <div class="message">
            <?php echo $mess; ?>
        </div>
</body>
</html>
