<?php
    require './db_config.php';
if (isset($_GET['id'])) {

    $query = $db->prepare("DELETE FROM employees WHERE employeeNumber = ?");

    // Exécution de la requête
    $query->execute([
        $_GET['id'],
    ]);
    echo 'Deleted';
}
else {
    require './error.phtml';
}