<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/model/class.PDO.lavage.inc.php');

$pdo = PdoLavage::getPdoLavage();
$prestations = $pdo->getLesPrestations();

include($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/vues/prestation.php');
?>
