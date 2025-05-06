<?php

include('./configdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the input
    $phone = trim($_POST['phone']);

    // Check if the phone number is valid (10 digits)
    if (preg_match("/^\d{10}$/", $phone)) {
        echo "The phone number has been successfully registered.";
    } else {
        echo "Invalid phone number. Please enter again.";
    }
} else {
    echo "No data sent.";
}
?>
