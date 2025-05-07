<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}
?>

<h1 class="text-3xl text-black pb-6">Congrats, the team has successfully infiltrated in the Fish Kingdom as <strong>Catfish</strong>.</h1>
<img src="../backgrounds/cat_fish.png" alt="CatFish" style="width: 15%; max-width: 400px; display: block; margin: auto;" />
<?php
    echo "###########################################<br>";
    echo "# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;&nbsp;&nbsp; FLAG: CATF{C4T_F15H3D}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<br>";
    echo "###########################################<br>";
?>