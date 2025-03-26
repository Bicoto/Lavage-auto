<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $conn = new mysqli('localhost', 'root', '', 'lavageauto');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom, $prenom, $email, $hashed_password);

        if ($stmt->execute()) {
            header("location: login.php");
            exit();
        } else {
            $_SESSION['message'] = "Erreur lors de la création du compte.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Créer un compte</title>
    <link rel="stylesheet" href="register.css">
    <script>
        function validatePassword() {
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            var errorMessage = document.getElementById('error-message');
            var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[/,*\-+.:!§?;\{\}\)\(\[\]\°&_\"#~`@$¤£%])[A-Za-z\d/,*\-+.:!§?;\{\}\)\(\[\]\°&_\"#~`@$¤£%]{12,}$/;

            if (!passwordRegex.test(password)) {
                errorMessage.innerHTML = "Le mot de passe doit contenir au moins 12 caractères, une majuscule, un chiffre ou un nombre, et un caractère spécial.";
                return false;
            } else if (password !== confirm_password) {
                errorMessage.innerHTML = "Les mots de passe ne correspondent pas.";
                return false;
            } else {
                errorMessage.innerHTML = "";
                return true;
            }
        }

        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var confirmPasswordField = document.getElementById('confirm_password');
            var toggleButton = document.getElementById('togglePassword');

            if (passwordField.type === 'password' && confirmPasswordField.type === 'password') {
                passwordField.type = 'text';
                confirmPasswordField.type = 'text';
                toggleButton.innerHTML = 'Masquer';
            } else {
                passwordField.type = 'password';
                confirmPasswordField.type = 'password';
                toggleButton.innerHTML = 'Afficher';
            }
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Créer un compte</h2>
        <form method="post" action="register.php" onsubmit="return validatePassword()">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <button type="button" id="togglePassword" onclick="togglePasswordVisibility()">Afficher</button>
            <label for="confirm_password">Confirmer le mot de passe:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <input type="submit" value="Créer un compte">
            <p id="error-message" class="error-message"></p>
        </form>
        <?php if (isset($_SESSION['message'])) { echo "<p class='error-message'>" . $_SESSION['message'] . "</p>"; } ?>
    </div>
</body>
</html>
