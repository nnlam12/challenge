<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}
echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <button style="font-size: 20px; padding: 10px 20px; background-color:rgb(62, 78, 214); color: black; border: none; border-radius: 5px; cursor: pointer;" onclick="window.location.href=\'./deposit_withdrawal.php\'">Enter Bank</button>
      </div>';
?>