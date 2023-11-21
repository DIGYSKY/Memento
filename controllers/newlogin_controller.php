<?php

require './connexion_controller.php';

session_unset();
session_destroy();
session_start();

if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.php?page=newregister");
    exit();
}

if (!isset($_POST['password']) || $_POST['password'] < 8) {
    header("Location: ../index.php?page=newregister");
    exit();
}

if (!isset($_POST['passwordconf']) || $_POST['passwordconf'] < 8) {
    header("Location: ../index.php?page=newregister");
    exit();
}

$query = 'SELECT * FROM users';
$response = $bdd->query($query);
$users = $response->fetchAll();
$response->closeCursor();

for ($i = 0; $i < count($users); $i++) {
    if ($_POST['email'] == $users[$i]['email']) {
        header("Location: ../index.php?page=newregister");
        exit();
        break;
    }
}



$query = "INSERT INTO users (email, name, firstname, password) VALUES (:email, :name, :firstname, :password)";
$request = $bdd->prepare($query);

$email = $_POST['email'];
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$password = md5($_POST['password']);

$request->bindParam(':email', $email);
$request->bindParam(':name', $name);
$request->bindParam(':firstname', $firstname);
$request->bindParam(':password', $password);
$request->execute();

// $query = "UPDATE users SET email = :email, name = :name, firstname = :firstname, password = :password WHERE id = :id";

// try {
//     $stmt = $bdd->prepare($query);
//     $stmt->bindParam(':brand', $_POST['brand']);
//     $stmt->bindParam(':name', $_POST['name']);
//     $stmt->bindParam(':selling_price', $_POST['selling_price']);
//     $stmt->bindParam(':id', $_POST['id']);
//     $stmt->execute();
// } catch (PDOException $e) {
//     echo "<p>Erreur lors de l'exécution de la requête : " . $e->getMessage() . "</p>";
// }

header("Location: ../index.php?page=account");
exit();