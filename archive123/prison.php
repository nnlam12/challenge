<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}

function replaceExtension($string) {
    if (strpos(strtolower($string), '.php') !== false) {
        $string = str_replace('.php', '', strtolower($string));
    }
    return $string;
}

$maxSize = 2 * 1024 * 1024;
$mess = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $message = $_POST['message'];

    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $uploadDir = 'uploads/';
        $originalName = basename($_FILES['attachment']['name']);
        $safeName = replaceExtension($originalName);

        if ($_FILES['attachment']['size'] > $maxSize){
            echo "Le fichier dépasse 2 Mo \ The file exceeds 2 MB";
            exit();
        }

        $uploadFile = $uploadDir . $safeName;
        
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadFile)) {
            echo "Le fichier $safeName a été téléchargé avec succès";
        } else {
            echo "Une erreur s'est produite lors du téléchargement du fichier. \ An error occurred while uploading the file. ";
        }
    } else {
        echo "Aucun fichier téléchargé ou erreur de fichier. \ No file uploaded or file error.";
    }
    
    echo '<div style="width: 80%; margin: 20px auto; padding: 20px; background-color: #f4f7fc; border-radius: 8px; border: 1px solid #ccc; font-family: Arial, sans-serif; word-wrap: break-word; white-space: normal;">';
    echo "<p><strong>Titre \ Title :</strong> $title</p>";
    echo "<p><strong>Notification \ Notification :</strong> $message</p>";
    echo "</div><br><br><br><br>";
}

?>

<h1 class="text-3xl text-black pb-6">Use your X-ray vison to see inside of the lock and crack it</h1>

<form action="tabs.php" method="POST" enctype="multipart/form-data">
    <label for="Code">Titre:</label><br>
    <input type="text" id="title" name="title" required><br><br>

    <input type="submit" value="Upload">
</form>
<?php
    echo $mess;
?>


