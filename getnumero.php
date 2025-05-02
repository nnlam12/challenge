<?php

include('./configdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the input
    $phone = trim($_POST['phone']);

    // Check if the phone number is valid (10 digits)
    if (preg_match("/^\d{10}$/", $phone)) {
        try {
            // Connecting to the database
            $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Add the number to the database
            $stmt = $db->prepare("INSERT INTO $table_name_number (telephone) VALUES (:phone)");
            $stmt->bindParam(':phone', $phone);

            // Execution of the statement
            if ($stmt->execute()) {
                echo "Le numéro de téléphone a été enregistré avec succès. \ The phone number has been successfully registered.";
            } else {
                echo "Impossible d'enregistrer le numéro de téléphone. Veuillez réessayer. \ Unable to register the phone number. Please try again.";
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Duplicate entry error code
                echo "Ce numéro de téléphone existe déjà.\ The number has already been registered.";
            } else {
                echo "Erreur de connexion à la base de données: \ Error connecting to the database." . $e->getMessage();
            }
        }
    } else {
        echo "Numéro de téléphone invalide. Veuillez entrer à nouveau. \ Invalid phone number. Please enter again.";
    }
} else {
    echo "Aucune donnée envoyée.\ No data sent.";
}
?>
