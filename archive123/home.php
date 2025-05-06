<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}
?>

<h1 class="text-3xl text-black pb-6">Congrats, the team has successfully infiltrated in the Fish Kingdom as <strong>Catfish</strong>.</h1>
<img src="../backgrounds/cat_fish.png" alt="CatFish" style="width: 10%; max-width: 400px; display: block; margin: auto;" />
<?php
    echo "###########################################<br>";
    echo "# FLAG: CTF_X_Y_{677956422481540597995464685999}&nbsp;&nbsp;#<br>";
    echo "###########################################<br>";
?>