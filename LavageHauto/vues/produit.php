<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /LavageHauto/vues/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="service.css">
    <title>Nos Produits</title>
</head>
<body>
<nav>
    <h1>Lavage</h1>
    <ul>
        <li class="active">
            <a href="/LavageHauto/vues/Accueil.php">Accueil</a>
        </li>
        <li>
            <a href="/LavageHauto/vues/prestation.php">Nos prestations</a>
        </li>
        <li>
            <a href="/LavageHauto/vues/produit.php">Nos produits</a>
        </li>
        <li>
            <a href="/LavageHauto/vues/devis.php">Faire un devis</a>
        </li>
       
    </ul>
</nav>

   
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Lavagehauto/model/class.PDO.lavage.inc.php');


$c = new PdoLavage();

$tableau = $c->getLesproduit();

foreach ($tableau as $prestation) {
       ?>
    <div class="tab">
    <div class="image">

            <img src=<?php echo $prestation['image']  ?>

<?php echo $prestation['nom'] ?>>
        </div>
    <div class="nom">
            <?php echo $prestation['nom'] ?>
    </div>
    <div class="carac">
            <?php echo $prestation['caracteristique'] ?>
    </div>
    <br>'
    <div class="prix">
   <?php echo $prestation['prix']  ?>
   €
    </div>
    <div class="bouton-devis">
            <a href="/LavageHauto/vues/devis.php" class="btn-devis">Faire un devis</a>
        </div>
    </div>
    <?php
}

?>
 <footer>
        <p>© 2024 Lavage de Luxe. Tous droits réservés.</p>
    </footer>
</body>
