<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/model/class.PDO.lavage.inc.php');

$pdo = PdoLavage::getPdoLavage();
$prestations = $pdo->getLesPrestations();
$produits = $pdo->getLesproduit();

include($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/vues/Accueil.php');
?>
