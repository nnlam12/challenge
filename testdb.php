<?php
$db_host = 'localhost'; // Azure database host
$db_user = 'root'; // Azure database username (include the server name)
$db_pass = 'kali'; // Azure database password
$db_name = 'catf-db'; // Database name
$table_name_user = 'user'; // User table
$table_name_number = 'number'; // Phone number table

try {
    // Establish database connection without SSL
    $db = new PDO(
        "mysql:host=$db_host;dbname=$db_name;charset=utf8",
        $db_user,
        $db_pass
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}
?>
