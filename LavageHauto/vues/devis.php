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
    <link rel="stylesheet" href="styl.css">
    <title>Formulaire de devis</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier si l'utilisateur est connecté
            if (!<?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>) {
                alert("Veuillez vous connecter pour faire un devis.");
                window.location.href = "/LavageHauto/vues/login.php";
            }
        });
    </script>
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


    <h2>Formulaire de Devis</h2>
    <form id="devisForm">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="telephone">Téléphone :</label>
        <input type="tel" id="telephone" name="telephone" required><br><br>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required><br><br>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="choix">Choix :</label>
        <select id="choix" name="choix" required>
            <option value="">--Sélectionner une option--</option>
            <option value="prestation">Prestation</option>
            <option value="produit">Produit</option>
        </select><br><br>

        <label for="detailsChoix">Détails :</label>
        <select id="detailsChoix" name="detailsChoix" required>
            <option value="">--Sélectionner un choix--</option>
        </select><br><br>

        <label for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" min="1" required><br><br>

        <button type="button" onclick="genererDevis()">Envoyer</button>
        <p class="error-message" id="error-message">Veuillez remplir tous les champs avant de générer le devis.</p>
    </form>

    <footer>
        <p>© 2024 Lavage de Luxe. Tous droits réservés.</p>
    </footer>

    <script>
        // Prix des prestations et produits
        const prix = {
            prestations: {
                "Lavage Extérieur": 69,
                "Lavage Intérieur": 59,
                "Lavage Extérieur et Intérieur": 109,
                "Traitement Céramique": 39,
                "Lustrage Intégral": 49
            },
            produits: {
                "Coffret Lavage Normal": 12,
                "Coffret Lavage Premium": 21,
                "Coffret Lavage Exclusif": 35,
                "Bouteille de Savon Ultra Moussant": 6,
                "Pulvérisateur Lustrant Déperlant": 4,
                "Cire Lustrante": 16
            }
        };

        const prestations = Object.keys(prix.prestations);
        const produits = Object.keys(prix.produits);

        document.getElementById('choix').addEventListener('change', function() {
            const choix = this.value;
            const detailsChoix = document.getElementById('detailsChoix');
            detailsChoix.innerHTML = ''; 

            let options = '';
            if (choix === 'prestation') {
                prestations.forEach(function(prestation) {
                    options += `<option value="${prestation}">${prestation}</option>`;
                });
            } else if (choix === 'produit') {
                produits.forEach(function(produit) {
                    options += `<option value="${produit}">${produit}</option>`;
                });
            }
            detailsChoix.innerHTML = options;
        });

        async function genererDevis() {
            const nom = document.getElementById('nom').value;
            const prenom = document.getElementById('prenom').value;
            const telephone = document.getElementById('telephone').value;
            const adresse = document.getElementById('adresse').value;
            const email = document.getElementById('email').value;
            const choix = document.getElementById('choix').value;
            const detailsChoix = document.getElementById('detailsChoix').value;
            const quantite = document.getElementById('quantite').value;
            const errorMessage = document.getElementById('error-message');

            if (nom === '' || prenom === '' || telephone === '' || adresse === '' || email === '' || choix === '' || detailsChoix === '' || quantite === '') {
                errorMessage.style.display = 'block'; 
            } else {
                errorMessage.style.display = 'none';

                let prixHT = 0;
                if (choix === 'prestation') {
                    prixHT = prix.prestations[detailsChoix];
                } else if (choix === 'produit') {
                    prixHT = prix.produits[detailsChoix];
                }

                const totalHT = prixHT * quantite;
                const tva = 0.2; 
                const totalTTC = totalHT * (1 + tva);

                // Utilisation de jsPDF pour créer le PDF
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                // Informations de l'entreprise
                doc.setFont("helvetica", "bold");
                doc.setTextColor(0, 0, 0); // Couleur noire
                doc.text("Lavage", 20, 20);
                doc.setFont("helvetica", "normal");
                doc.text("Adresse : 97110 Pointe-à-Pitre, Rue Raspail", 20, 30);
                doc.text("Numéro : 0690 961 415", 20, 40);

                // Informations sur le devis
                doc.setFontSize(20);
                doc.text("Devis Proforma", 20, 60);
                doc.setFontSize(12);
                doc.text(`Nom : ${nom}`, 20, 70);
                doc.text(`Prénom : ${prenom}`, 20, 80);
                doc.text(`Adresse : ${adresse}`, 20, 90);
                doc.text(`Téléphone : ${telephone}`, 20, 100);
                doc.text(`E-mail : ${email}`, 20, 110);
                doc.text(`Nom du produit ou prestation : ${detailsChoix}`, 20, 120);
                doc.text(`Quantité : ${quantite}`, 20, 130);
                doc.text(`Total HT : ${totalHT.toFixed(2)} €`, 20, 140);
                doc.text(`TVA (20%) : ${(totalHT * tva).toFixed(2)} €`, 20, 150);
                doc.text(`Total TTC : ${totalTTC.toFixed(2)} €`, 20, 160);

                // Téléchargement du PDF
                doc.save("devis_proforma.pdf");
            }
        }
    </script>
</body>
</html>
