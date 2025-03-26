<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/model/class.PDO.lavage.inc.php');

$pdo = PdoLavage::getPdoLavage();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $pdo->loginUser($email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        header("location: /LavageHauto/vues/dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Identifiants incorrects.";
    }
}

include($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/vues/login.php');
?>
