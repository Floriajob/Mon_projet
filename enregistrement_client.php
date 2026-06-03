<?php
include("login_traitement.php");

if(isset($_POST['save'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $mail = $_POST['mail'];

    $total = count($nom);

     for($i=0; $i<$total; $i++){

        $nom_client = mysqli_real_escape_string($conn, $nom[$i]);
        $prenom_client = mysqli_real_escape_string($conn, $prenom[$i]);
        $age_client = mysqli_real_escape_string($conn, $age[$i]);
        $adresse_client = mysqli_real_escape_string($conn, $adresse[$i]);
        $ville_client = mysqli_real_escape_string($conn, $ville[$i]);
        $mail_client = mysqli_real_escape_string($conn, $mail[$i]);

        $result = $conn->query("SELECT id_client FROM client ORDER BY id_client DESC LIMIT 1");
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            $dernier_id = $row['id_client']; // ex: CL005

            $numero = intval(substr($dernier_id, 2)) + 1;

            $nouvel_id = "CL" . str_pad($numero, 3, "0", STR_PAD_LEFT);
        }else{
            $nouvel_id = "CL001";
        }

        $sql = "INSERT INTO client(id_client, nom, prenom, age, adresse, ville, mail)
                VALUES(
                '$nouvel_id',
                '$nom_client',
                '$prenom_client',
                '$age_client',
                '$adresse_client',
                '$ville_client',
                '$mail_client'
                )";

        $conn->query($sql);
    }

    header("Location: accueil.php");
    exit();
}
?>