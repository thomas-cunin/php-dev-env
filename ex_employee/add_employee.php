<?php 

require './db_config.php';
    $query = $db->prepare("SELECT employeeNumber, lastName, firstName, jobTitle FROM employees");

    // Exécution de la requête
    $query->execute();

    // On récupère tous les résultats de la requête dans une variable $customers
    $otherEmployees = $query->fetchAll();

    $query = $db->prepare("SELECT country, city, officeCode FROM offices");

    // Exécution de la requête
    $query->execute();

    // On récupère tous les résultats de la requête dans une variable $customers
    $offices = $query->fetchAll();

if (isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['officeCode'], $_POST['jobTitle'])){
    var_dump($_POST);
    if(!empty($_POST['reportsTo'])){
        $employeeNew = [
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'reportsTo' => $_POST['reportsTo'],
            'officeCode' => $_POST['officeCode'],
            'jobTitle' => $_POST['jobTitle']
        ];
        var_dump($employeeNew);
        $query = $db->prepare("INSERT INTO employees (firstName, lastName, email, reportsTo, officeCode, extension, jobTitle) VALUES (?, ?, ?, ?, ?, 'x6000', ?)");
    
        // Exécution de la requête
        $query->execute([
            $employeeNew['firstName'],
            $employeeNew['lastName'],
            $employeeNew['email'],
            $employeeNew['reportsTo'],
            $employeeNew['officeCode'],
            $employeeNew['jobTitle']

        ]);
    } else {
        $employeeNew = [
            'id' => $_POST['id'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'officeCode' => $_POST['officeCode'],
            'jobTitle' => $_POST['jobTitle']
        ];
        var_dump($employeeNew);
        $query = $db->prepare("INSERT INTO employees (firstName, lastName, email, reportsTo, officeCode, extension, jobTitle) VALUES (?, ?, ?, null, ?, 'x6000', ?)");
    
        // Exécution de la requête
        $query->execute([
            $employeeNew['firstName'],
            $employeeNew['lastName'],
            $employeeNew['email'],
            $employeeNew['officeCode'],
            $employeeNew['jobTitle']
        ]);
    }
    var_dump($_POST);
    echo 'Added !';
    header('location: index.php');
}
else {
    require './add_employee.phtml';
}