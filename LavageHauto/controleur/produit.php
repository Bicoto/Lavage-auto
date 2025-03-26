<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/model/class.PDO.lavage.inc.php');

$pdo = PdoLavage::getPdoLavage();
$produits = $pdo->getLesproduit();

include($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/vues/produit.php');
?>
