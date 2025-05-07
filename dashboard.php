<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit();
}

if (!isset($_SESSION['otp'])) {
    $otp = rand(1000, 9999); // Genearate a random 4-digit OTP
    $_SESSION['otp'] = $otp;
}

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['otp'])) {
        if ($_POST['otp'] == $_SESSION['otp'] ) {
            
            echo "<div style='text-align: center;'>";
            echo "*########################################*<br>";
            echo "#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
            echo "#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FLAG: CATF{F15H_K1NGD0M}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
            echo "#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
            echo "*########################################*<br>";
            echo "</div>";
            
            echo '<div style="text-align: center;"><button onclick="window.location.href=\'./archive123/index.php\'">Go!</button></div>';
            echo "<style>
        body {
            background: url('./backgrounds/apple_cat.png') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }";
            exit();
        } else {
            header("Location: ./icat_fail.php");
            exit();
        }
    }
} else {
    $error_message = "No data sent.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>FindMyCat By iCat</title>
    <link rel="stylesheet" href="./style.css"/>
    <link rel="icon" href="./backgrounds/favicon.ico" type="image/x-icon">
    <style>
        body {
            background: url('./backgrounds/apple_cat.png') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
    </style>
    <script>
        function sendPhone() {
            const phone = document.getElementById('phone').value;
            const message = document.getElementById('message');

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "getnumero.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    message.innerHTML = xhr.responseText;
                }
            };

            xhr.send("phone=" + encodeURIComponent(phone));
        }
    </script>
</head>
<body style="text-align: center;">
    <h1>iCat 2FA</h1>
    <p>Connect to FindMyCat.</p>

    <div class="form-container">
        <form onsubmit="event.preventDefault(); sendPhone();" class="form">
            <label for="phone">Your phone number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Phone Number" required pattern="\d{10}" title="The phone number's format is not correct (10 digits)">
            <button type="submit">Get OTP</button>
        </form>
    </div>
    <div id="message"></div>

    <br>
    <br>

    <div class="form-container">
        <form action="" method="POST" class="form">
            <label>Code OTP:</label>
            <input type="text" name="otp" placeholder="1234" maxlength="4" required>
            <button type="submit">Authenticate</button>
        </form>
    </div>

    <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    
    <br>
    <br>
    <br>
    <br>

    <?php
        echo "<div style='text-align: center;'>";
        echo "*################################################*<br>";
        echo "#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
        echo "#&nbsp;&nbsp;&nbsp&nbsp;FLAG: CATF{C001_C4T_W17H_4_H4T_0N_8O4RD}&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
        echo "#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
        echo "*################################################*<br>";
        echo "</div>";
    ?>

</body>
</html>
