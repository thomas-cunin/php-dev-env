<?php
require 'db_config.php';

if (isset($_GET['id']) and !isset($_POST['id'])) {

    echo 'Cas 1';
    $id = $_GET['id'];
    // Création de la requête SQL (pas encore exécutée)
    $query = $db->prepare("SELECT employeeNumber, lastName, firstName, email, officeCode, jobTitle, reportsTo FROM employees WHERE employeeNumber = ?");

    // Exécution de la requête
    $query->execute([
        $id,
    ]);

    // On récupère tous les résultats de la requête dans une variable $customers
    $employee = $query->fetch();

    $query = $db->prepare("SELECT employeeNumber, lastName, firstName, jobTitle FROM employees WHERE employeeNumber != ?");

    // Exécution de la requête
    $query->execute([
        $id,
    ]);

    // On récupère tous les résultats de la requête dans une variable $customers
    $otherEmployees = $query->fetchAll();

    $query = $db->prepare("SELECT country, city, officeCode FROM offices");

    // Exécution de la requête
    $query->execute();

    // On récupère tous les résultats de la requête dans une variable $customers
    $offices = $query->fetchAll();

    if ($employee != false) {
        require './edit_employee.phtml';
        var_dump($employee);
    }
    else {
        require './error.phtml';
    }

} 

elseif (isset($_POST['id'],$_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['officeCode'])){
    echo 'Cas 2';
    if(!empty($_POST['reportsTo'])){
        $employeeUpdate = [
            'id' => $_POST['id'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'reportsTo' => $_POST['reportsTo'],
            'officeCode' => $_POST['officeCode']
        ];
        $query = $db->prepare("UPDATE employees SET firstName = ?, lastName = ?, email = ?, reportsTo = ?, officeCode = ? WHERE employeeNumber = ?");
    
        // Exécution de la requête
        $query->execute([
            $employeeUpdate['firstName'],
            $employeeUpdate['lastName'],
            $employeeUpdate['email'],
            $employeeUpdate['reportsTo'],
            $employeeUpdate['officeCode'],
            $employeeUpdate['id']
        ]);
    } else {
        $employeeUpdate = [
            'id' => $_POST['id'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'officeCode' => $_POST['officeCode']
        ];
        $query = $db->prepare("UPDATE employees SET firstName = ?, lastName = ?, email = ?, reportsTo = null, officeCode = ? WHERE employeeNumber = ?");
    
        // Exécution de la requête
        $query->execute([
            $employeeUpdate['firstName'],
            $employeeUpdate['lastName'],
            $employeeUpdate['email'],
            $employeeUpdate['officeCode'],
            $employeeUpdate['id']
        ]);
    }
    var_dump($_POST);
    echo 'Modified !';
    header('location: index.php');
}
else {
    header('location: index.php');
    echo 'Cas 3';
    var_dump($_POST);
}
