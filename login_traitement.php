<?php
session_start();
$conn = new mysqli("localhost", "root", "", "essaiebdd");

if (isset($_POST['connecter'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE login='$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user['login'];
            header("Location: accueil.php");

        } else {
            echo "Mot de passe incorrect";
        }

    } else {
        echo "Utilisateur non trouvé";
    }
}
?>