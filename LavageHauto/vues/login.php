<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'lavageauto');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header("location: Accueil.php"); // Rediriger vers la page d'accueil
            exit();
        } else {
            $_SESSION['message'] = "Mot de passe incorrect.";
        }
    } else {
        $_SESSION['message'] = "Aucun compte trouvé avec cet e-mail.";
    }
   
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: /LavageHauto/vues/login.php");
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var toggleButton = document.getElementById('togglePassword');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleButton.innerHTML = 'Masquer';
            } else {
                passwordField.type = 'password';
                toggleButton.innerHTML = 'Afficher';
            }
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form method="post" action="login.php">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="button" id="togglePassword" onclick="togglePasswordVisibility()">Afficher</button><br><br>
            <input type="submit" value="Se connecter">
        </form>
        <?php if (isset($_SESSION['message'])) { echo "<p class='error-message'>" . $_SESSION['message'] . "</p>"; } ?>
        <p>Vous n'avez pas de compte ? <a href="/LavageHauto/vues/register.php" class="register-link">Créer un compte</a></p>
    </div>
</body>
</html>
