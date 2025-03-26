<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/model/class.PDO.lavage.inc.php');

$pdo = PdoLavage::getPdoLavage();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($pdo->registerUser($nom, $prenom, $email, $password)) {
        $_SESSION['message'] = "Compte créé avec succès!";
        header("location: /LavageHauto/vues/login.php");
        exit();
    } else {
        $_SESSION['message'] = "Erreur lors de la création du compte.";
    }
}

include($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/vues/register.php');
?>
