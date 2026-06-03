<?php
$conn = new mysqli("localhost", "root", "", "essaiebdd");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$contact = $_POST['contact'];
$login = $_POST['login'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (nom, prenom, contact, login, password)VALUES ('$nom', '$prenom', '$contact', '$login', '$password')";

if ($conn->query($sql)) {
    header("Location: accueil.php");
} else {
    echo "Erreur : " . $conn->error;
}
?>
