<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}
echo '<div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
    <img src="../backgrounds/prison_cat.png" alt="Bank Image" style="max-width: 100%; height: auto;">
</div>';

echo '<div style="display: flex; justify-content: center; align-items: center; height: 10vh;">
    <button style="font-size: 20px; padding: 10px 20px; background-color:rgb(159, 95, 196); color: white; border: none; border-radius: 5px; cursor: pointer; box-shadow: 0px 4px 6px rgba(255, 255, 255, 0.5);" onclick="window.location.href=\'./prison_lock.php\'">Crack the lock</button>
      </div>';
      echo '<div style="display: flex; justify-content: right; align-items: right; margin-top: 20px;">
      <img src="../backgrounds/thumb_cat.jpg" alt="Bank Image" style="max-width: 100%; height: auto;">
  </div>';
?>