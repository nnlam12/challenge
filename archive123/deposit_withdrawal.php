<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}

include("./../encode.php");

// Generate a session key if it doesn't exist
if (!isset($_SESSION['key'])) {
    $key = "secret_key_" . rand(100000, 999999);
    $_SESSION['key'] = $key;
    $data = '{"username":"tralalero_tralala","role":"king","key":"' . $key . '"}';
    $kingID = custom_encrypt($data, $key);
    $_SESSION['kingID'] = $kingID;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['role']) && !isset($_SESSION['username_input'])) {
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');
        if ($role !== 'commoner' || $username !== 'catfish'){
            $message = "Sorry, I need to see your ID first, you don't seem to be what you say you are.";
        }
        else{

            $data = '{"username":"' . $username . '","role":"' . $role . '","key":"' . $_SESSION['key'] . '"}';
            $clientID = custom_encrypt($data, $_SESSION['key']);
            $_SESSION['clientID'] = $clientID;
            // Display the client key immediately after processing the first form
            echo '<div class="mt-12 bg-gray-100 p-6 rounded-lg shadow-md">';
            echo '<h3 class="text-2xl font-bold text-gray-800">OK this is your Client Key for today:</h3>';
            echo '<p class="text-gray-700 text-lg">' . htmlspecialchars($clientID, ENT_QUOTES, 'UTF-8') . '</p>';
            echo '</div>';
        }
        $_SESSION['username_input'] = true;
    } elseif (isset($_POST['client_key']) && !isset($_SESSION['client_key_input'])) {
        $clientKey = htmlspecialchars($_POST['client_key'], ENT_QUOTES, 'UTF-8');
        if (isset($_SESSION['clientID']) && (($clientKey === $_SESSION['clientID']) || ($clientKey === $_SESSION['kingID']))) {
            $message = "Withdrawal successful!";
            $_SESSION['client_key_input'] = true;
            if ($clientKey === $_SESSION['kingID']) {
                $message .= " You are the King! <br>";
                $message .= "###########################################<br>";
                $message .= "# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;&nbsp;&nbsp; FLAG: CATF{TR35UR3_80X_0F_TH3_K1NG}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
                $message .= "###########################################<br>";
                $message .= '<a href="' . htmlspecialchars('./tresure_box', ENT_QUOTES, 'UTF-8') . '" class="text-blue-500 underline">Claim your treasure here</a>.';
                }
        } else {
            $message = "Invalid Client Key. Please come back tomorrow.";
        }
    } elseif (isset($_POST['erase_key'])) {
        unset($_SESSION['key'], $_SESSION['username_input'], $_SESSION['client_key_input'], $_SESSION['clientID']);
        $message = "All inputs and session key have been reset. <br>You can have 1 deposit and 1 withdrawal per day.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit & Withdrawal</title>
    <link rel="icon" href="../backgrounds/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: url('../backgrounds/fish_kingdom.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Karla', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-8 py-12">
        <h1 class="text-5xl font-bold text-center text-blue-800 mb-12" style="text-shadow: 2px 2px 4px white;">Welcome to the Crabby Bank</h1>
        <div class="flex flex-col lg:flex-row justify-between items-start bg-white shadow-lg rounded-lg p-10">
            <img src="./../backgrounds/clam_bank.png" alt="King" class="w-1/3 h-auto rounded-lg shadow-md mb-8 lg:mb-0">

            <!-- First Form -->
            <form method="POST" action="" class="flex-grow mx-4 bg-gray-100 p-10 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-blue-600 mb-6">Deposit</h2>
                <label for="username" class="block text-gray-700 font-semibold mb-3 text-lg">Name:</label>
                <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-4 px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-6 text-lg" 
                <?php echo isset($_SESSION['username_input']) ? 'disabled' : ''; ?> required>

                <label for="role" class="block text-gray-700 font-semibold mb-3 text-lg">Role:</label>
                <input type="text" id="role" name="role" class="shadow appearance-none border rounded w-full py-4 px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-6 text-lg" 
                <?php echo isset($_SESSION['username_input']) ? 'disabled' : ''; ?> required>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded w-full text-lg" 
                <?php echo isset($_SESSION['username_input']) ? 'disabled' : ''; ?>>Deposit</button>
            </form>

            <!-- Second Form -->
            <form method="POST" action="" class="flex-grow mx-4 bg-gray-100 p-10 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-green-600 mb-6">Withdraw</h2>
                <label for="client_key" class="block text-gray-700 font-semibold mb-3 text-lg">Client Key:</label>
                <input type="text" id="client_key" name="client_key" class="shadow appearance-none border rounded w-full py-4 px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-6 text-lg" 
                <?php echo isset($_SESSION['client_key_input']) ? 'disabled' : ''; ?> required>

                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded w-full text-lg" 
                <?php echo isset($_SESSION['client_key_input']) ? 'disabled' : ''; ?>>Withdraw</button>
            </form>
        </div>

        <!-- Reset Button -->
        <form method="POST" action="" class="mt-12 text-center">
            <button type="submit" name="erase_key" class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-6 rounded text-lg">Return tomorrow</button>
        </form>
        <!-- Return to Index Page -->
        <form method="GET" action="index.php" class="mt-12 text-center">
            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded text-lg">Exit</button>
        </form>
        <!-- Display Message -->
        <?php if (isset($message)): ?>
            <div class="mt-6 bg-gray-200 p-4 rounded-lg shadow-md max-w-md mx-auto">
            <p class="text-center text-gray-800 font-bold text-lg"><?php echo $message; ?></p>
            </div>
        <?php endif; ?>

    </div>
</body>

</html>



