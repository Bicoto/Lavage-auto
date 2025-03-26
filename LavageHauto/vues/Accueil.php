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
    <link rel="stylesheet" href="style.css">
    <title>Lavage</title>
</head>
<body>
<nav>
    <h1>Lavage</h1>
    <ul>
        <li class="active">
            <a href="/LavageHauto/vues/Accueil.php">Accueil</a>
        </li>
        <li>
            <a href="#Nos-prestations">Nos prestations</a>
        </li>
        <li>
            <a href="#Nos-produits">Nos produits</a>
        </li>
        <li>
            <a href="/LavageHauto/vues/devis.php">Faire un devis</a>
        </li>
       
    
    </ul>
</nav>

<header>
    <h1 class="video-title">Lavage de luxe</h1>
    <div class="video-container">
        <video autoplay loop muted controls width="800">
            <source src="6872469-uhd_3840_2160_25fps.mp4" type="video/mp4">
        </video>
    </div>
</header><!-- Section À propos -->

<!-- Section Prestations -->
<section id="Nos-prestations">
    <h2>Nos Prestations</h2>
    <div class="prestations-card-container">
        <div class="prestations-card">
            <div class="card-image">
                <img src="pexels-lynxexotics-27985143.jpg" alt="Lavage Auto Basique">
            </div>
            <div class="card-content">
                <h2>Nos Prestations</h2>
                <p class="description">Un entretien régulier de votre véhicule avec des services essentiels pour l'intérieur et l'extérieur.</p>
                <a href="/LavageHauto/vues/prestation.php" class="button">Choisir</a>
            </div>
        </div>
    </div>
</section>

<!-- Section Produits -->
<section id="Nos-produits">
    <h2>Nos Produits</h2>
    <div class="prestations-card-container">
        <div class="prestations-card">
            <div class="card-image">
                <img src="pexels-introspectivedsgn-4140943.jpg" alt="Lavage Auto Premium">
            </div>
            <div class="card-content">
                <h2>Nos Produits</h2>
                <p class="description">Un soin de qualité supérieure pour protéger la peinture et offrir une brillance exceptionnelle.</p>
                <a href="/LavageHauto/vues/produit.php" class="button">Choisir</a>
            </div>
        </div>
    </div>
</section>

<footer>
    <p>© 2024 Lavage de Luxe. Tous droits réservés.</p>
</footer>
</body>
</html>

