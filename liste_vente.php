<?php
session_start();
date_default_timezone_set("Africa/Porto-Novo");
$conn = mysqli_connect("localhost", "root", "", "essaiebdd");

if(!$conn){
    die("Erreur connexion");
}

$date = date("Y-m-d");
$heure = date("H:i:s");

$facture = null;
$totalGeneral = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nom = $_POST["nom"]??
    ($_SESSION["nom"]?? null);
    $prenom = $_POST["prenom"]??
    ($_SESSION["prenom"]?? null);
    $articles = $_POST["articles"]??
    ($_SESSION["articles"]?? null);

    // client
    $sqlClient = "SELECT * FROM client WHERE nom='$nom' AND prenom='$prenom'";
    $resClient = mysqli_query($conn,$sqlClient);

    if(!$resClient || mysqli_num_rows($resClient) == 0){

    // sauvegarde temporaire
    $_SESSION["nom"] = $nom;
    $_SESSION["prenom"] = $prenom;
    $_SESSION["articles"] = $articles;

    header("Location: completez_info_client.php");
    exit();
}

$client = mysqli_fetch_assoc($resClient);
$idClient = $client["id_client"];

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

    // insertion commande
    $sql = "INSERT INTO commande(id_client,date_comm,heure_comm,montant)
            VALUES('$idClient','$date','$heure','$totalGeneral')";
    mysqli_query($conn,$sql);

    $idCommande = mysqli_insert_id($conn);

    // contenir
    foreach($articles_achetes as $a){

        $nomArticle = $a["nom"];

        $sqlA = "SELECT id_article FROM article WHERE design='$nomArticle'";
        $r = mysqli_query($conn,$sqlA);
        $d = mysqli_fetch_assoc($r);

        if($d){
            $idArticle = $d["id_article"];

            mysqli_query($conn,
            "INSERT INTO contenir(id_comm,id_article,qte_comm)
             VALUES('$idCommande','$idArticle','".$a["quantite"]."')");
        }
    }

    // FACTURE POUR AFFICHAGE
    $facture = [
        "nom"=>$nom,
        "prenom"=>$prenom,
        "articles"=>$articles_achetes,
        "total"=>$totalGeneral,
        "date"=>$date,
        "heure"=>$heure
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Facture</title>

<style>
body{font-family:Arial;background:#f2f2f2;}

.container{
    width:80%;
    margin:auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

.facture{
    border:2px solid #2c3e50;
    padding:15px;
    border-radius:10px;
    background:#fff;
}

h2{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

th{
    background:#2c3e50;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    text-align:center;
}

.total{
    text-align:right;
    font-size:20px;
    font-weight:bold;
    margin-top:10px;
}

.meta{
    text-align:right;
    margin-top:10px;
    color:gray;
}
a{
        text-decoration: none;
        background: #27ae60;
        color: white;
        padding: 10px 18px;
        border-raduis: 8px;
        font-weight: bold;
        margin-right: 10px;
    }
    a: hover{
        background: #219150;
    }
    .quitter{
        background: #e74c3c;
    }
    .quitter: hover{
        background: #c0392b;
    }

    .facture-historique{
        background: white;
        padding:20px;
        margin-top:20px;
        border-radius:12px;
        box-shadow:0 5px 15px rgba(0,0,0,0.1);
        border-left:6px solid #27ae60;
    }

    .facture-historique h3{
        color:#2c3e50;
        margin-bottom:10px;
    }

    .facture-historique table{
        width:100%;
        margin-top:15px;
        border-collapse:collapse;
    }

    .facture-historique th{
        background:#27ae60;
        color:white;
    }

    .facture-historique td{
        padding:10px;
        text-align:center;
        border:1px solid #ddd;
    }
</style>

</head>

<body>

<div class="container">
    <a href="accueil.php" class="quitter">Quitter</a> 

<?php if($facture){ ?>

<div class="facture">

<h2>FACTURE CLIENT</h2>

<p><b>Nom :</b> <?= $facture["nom"] ?></p>
<p><b>Prénom :</b> <?= $facture["prenom"] ?></p>

<table>
<tr>
<th>Article</th>
<th>Prix</th>
<th>Quantité</th>
<th>Total</th>
</tr>

<?php foreach($facture["articles"] as $a){ ?>
<tr>
<td><?= $a["nom"] ?></td>
<td><?= $a["prix"] ?> FCFA</td>
<td><?= $a["quantite"] ?></td>
<td><?= $a["total"] ?> FCFA</td>
</tr>
<?php } ?>

</table>

<div class="total">
TOTAL : <?= $facture["total"] ?> FCFA
</div>

<div class="meta">
Date : <?= $facture["date"] ?> <br>
Heure : <?= $facture["heure"] ?>
</div>

</div>

<?php } ?>

<hr>
<h2>Historique complet des factures</h2>

<?php

$sqlFactures = "SELECT c.id_comm, c.date_comm, c.heure_comm, c.montant,cl.nom, cl.prenom
FROM commande c
JOIN client cl ON c.id_client = cl.id_client
ORDER BY c.id_comm DESC";

$resFactures = mysqli_query($conn, $sqlFactures);

while($fact = mysqli_fetch_assoc($resFactures)){

    $idCommande = $fact["id_comm"];

    echo "<div class='facture-historique'>";

    echo "<h3>Facture client : ".$fact["nom"]." ".$fact["prenom"]."</h3>";

    echo "<p>
            <b>Date :</b> ".$fact["date_comm"]."<br>
            <b>Heure :</b> ".$fact["heure_comm"]."
          </p>";

    echo "<table>";
    echo "
    <tr>
        <th>ID Article</th>
        <th>Article</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Total</th>
    </tr>";

    $sqlArticles = "SELECT article.id_article,article.design,article.prix,contenir.qte_comm
    FROM contenir
    JOIN article ON contenir.id_article = article.id_article
    WHERE contenir.id_comm='$idCommande'";

    $resArticles = mysqli_query($conn, $sqlArticles);

    while($art = mysqli_fetch_assoc($resArticles)){

        $totalArticle = $art["prix"] * $art["qte_comm"];

        echo "
        <tr>
            <td>".$art["id_article"]."</td>
            <td>".$art["design"]."</td>
            <td>".$art["prix"]." FCFA</td>
            <td>".$art["qte_comm"]."</td>
            <td>".$totalArticle." FCFA</td>
        </tr>";
    }

    echo "</table>";

    echo "
    <div class='total'>
        TOTAL GENERAL : ".$fact["montant"]." FCFA
    </div>";

    echo "</div><br>";
}
?>

</div>

</body>
</html>