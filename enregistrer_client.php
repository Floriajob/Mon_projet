<?php
$conn = mysqli_connect("localhost", "root", "", "essaiebdd");

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$age = $_POST["age"];
$ville = $_POST["ville"];
$adresse = $_POST["adresse"];
$email = $_POST["email"];

$sql = "INSERT INTO client(nom, prenom, age, ville, adresse, email)
        VALUES('$nom','$prenom','$age','$ville','$adresse','$email')";

mysqli_query($conn, $sql);

echo "Client enregistré avec succès";
?>