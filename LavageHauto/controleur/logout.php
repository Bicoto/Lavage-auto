<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/model/class.PDO.lavage.inc.php');

$pdo = PdoLavage::getPdoLavage();
$pdo->logoutUser();

header("location: /LavageHauto/vues/login.php");
exit();
?>
