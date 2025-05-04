<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spinning Cat</title>
    <style>
        body {
            background: url('worldmap.png') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        button {
            position: absolute;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Capture the cat!</h1>
    <form method="POST" style="text-align: center; margin-top: 20px;">
        <button id="catButton" type="submit">
            <img id="spinningCat" src="oia-uia.gif" alt="Spinning Cat" style="display:block; margin:auto;">
        </button>
    </form>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['cat'] = true;
        header('Location: ./login.php');
        exit();
    }
    ?>

    <script>
        const button = document.getElementById('catButton');
        const cat = document.getElementById('spinningCat');

        // Add the "running effect" to the button
        let isRunning = true;
        
        button.addEventListener('mouseover', () => {
            if (isRunning) {
                const randomX = Math.random() * (window.innerWidth - button.offsetWidth);
                const randomY = Math.random() * (window.innerHeight - button.offsetHeight);
                button.style.left = `${randomX}px`;
                button.style.top = `${randomY}px`;
            }
        });
        
    </script>
</body>
</html>
