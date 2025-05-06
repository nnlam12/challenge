<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <style>
        body {
            background: url(./backgrounds/banana_cat.png) no-repeat center center;
            background-size: cover;
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 30%;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0078D4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #005A9E;
        }
    </style>
</head>
<body>
    <h1>You are not the user</h1>
    <button onclick="window.location.href='dashboard.php'">Return to Dashboard</button>
</body>
</html>