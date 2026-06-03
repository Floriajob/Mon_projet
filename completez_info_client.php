<?php
session_start();
date_default_timezone_set("Africa/Porto-Novo");

$conn = mysqli_connect("localhost", "root", "", "essaiebdd");

if(!$conn){
    die("Erreur connexion");
}

/* sécurité */
if(
    !isset($_SESSION["nom"]) || 
    !isset($_SESSION["prenom"]) || 
    !isset($_SESSION["articles"])
){
    header("Location: vente.php");
    exit();
}

$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$articles = $_SESSION["articles"];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $age = $_POST["age"];
    $ville = $_POST["ville"];
    $adresse = $_POST["adresse"];
    $email = $_POST["email"];

    // récupérer le dernier id_client
    $sqlLast = "SELECT id_client FROM client ORDER BY id_client DESC LIMIT 1";

    $resLast = mysqli_query($conn, $sqlLast);

    if(mysqli_num_rows($resLast) > 0){

        $lastClient = mysqli_fetch_assoc($resLast);
        $lastId = $lastClient["id_client"]; // ex: CL005

        $number = intval(substr($lastId, 2)); // récupère 5
        $number++;

        $newId = "CL" . str_pad($number, 3, "0", STR_PAD_LEFT);
    }
    else{
        $newId = "CL001";
    }

    /* enregistrer client */
    if(mysqli_query($conn,
    "INSERT INTO client(id_client,nom,prenom,age,ville,adresse,mail)
    VALUES('$newId','$nom','$prenom','$age','$ville','$adresse','$email')"));


    /* récupérer id client */
    $resClient = mysqli_query($conn,
    "SELECT id_client FROM client WHERE nom='$nom' AND prenom='$prenom'ORDER BY id_client DESC LIMIT 1");

    $client = mysqli_fetch_assoc($resClient);
    $idClient = $client["id_client"];

    /* calcul total */
    $totalGeneral = 0;
    $articles_achetes = [];

    foreach($articles as $a){

        if($a["quantite"] > 0){

            $total = $a["prix"] * $a["quantite"];

            $articles_achetes[] = [
                "nom"=>$a["nom"],
                "prix"=>$a["prix"],
                "quantite"=>$a["quantite"],
                "total"=>$total
            ];

            $totalGeneral += $total;
        }
    }

    /* enregistrer commande */
    $date = date("Y-m-d");
    $heure = date("H:i:s");

    mysqli_query($conn,
    "INSERT INTO commande(id_client,date_comm,heure_comm,montant)
    VALUES('$idClient','$date','$heure','$totalGeneral')");

    $idCommande = mysqli_insert_id($conn);

    /* remplir table contenir */
    foreach($articles_achetes as $a){

        $nomArticle = $a["nom"];
        $qte = $a["quantite"];

        $resArticle = mysqli_query($conn,
        "SELECT id_article 
         FROM article 
         WHERE design='$nomArticle'");

        $article = mysqli_fetch_assoc($resArticle);

        if($article){

            $idArticle = $article["id_article"];

            mysqli_query($conn,
            "INSERT INTO contenir(id_comm,id_article,qte_comm)
            VALUES('$idCommande','$idArticle','$qte')");
        }
    }

    /* nettoyage session */
    unset($_SESSION["nom"]);
    unset($_SESSION["prenom"]);
    unset($_SESSION["articles"]);

    /* redirection vers facture */
    header("Location: liste_vente.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Compléter client</title>

<style>
body{
    margin:0;
    padding:0;
    font-family: Arial;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#74b9ff,#0984e3);
}

.container{
    width:420px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    color:#2c3e50;
    margin-bottom:20px;
}

.client-info{
    background:#ecf0f1;
    padding:15px;
    border-radius:10px;
    text-align:center;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
    box-sizing:border-box;
}

input:focus{
    outline:none;
    border-color:#0984e3;
}

button{
    width:100%;
    padding:12px;
    background:#27ae60;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
    font-weight:bold;
}

button:hover{
    background:#219150;
}

.note{
    text-align:center;
    color:gray;
    margin-top:15px;
}

.quitter{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    background:#e74c3c;
    color:white;
    padding:10px;
    border-radius:8px;
    font-weight:bold;
}

.quitter:hover{
    background:#c0392b;
}
</style>

</head>
<body>

<div class="container">

    <h2>Compléter vos informations</h2>

    <div class="client-info">
        <b>Nom :</b> <?= $nom ?> <br>
        <b>Prénom :</b> <?= $prenom ?>
    </div>

    <form method="POST">

        <input type="number" name="age" placeholder="Âge" required>

        <input type="text" name="ville" placeholder="Ville" required>

        <input type="text" name="adresse" placeholder="Adresse" required>

        <input type="email" name="email" placeholder="Email" required>

        <button type="submit">
            Enregistrer et continuer
        </button>

    </form>

    <div class="note">
        Après validation, votre facture sera générée automatiquement.
    </div>

    <a href="vente.php" class="quitter">Annuler</a>

</div>

</body>
</html>