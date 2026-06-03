<?php
session_start();
date_default_timezone_set("Africa/Porto-Novo");
$conn = mysqli_connect("localhost", "root", "", "essaiebdd");

if (!$conn) {
    die("Erreur connexion");
}

// récupération articles
$sql = "SELECT id_article, design, prix FROM article";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Effectuer Vente</title>

<style>
body{
    font-family: Arial;
    background:#f4f4f4;
}

.container{
    width: 90%;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

.client{
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.client input{
    flex: 1;
    padding: 10px;
}

.produits{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 15px;
}

.card{
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.prix{
    color: green;
    font-weight: bold;
}

.total{
    margin-top: 20px;
    font-size: 20px;
    font-weight: bold;
}

button{
    padding: 10px;
    border: none;
    border-radius: 8px;
}

.valider{
    background: green;
    color: white;
}
</style>
</head>

<body>

<div class="container">
<h2>Effectuer une vente</h2>

<form method="POST" action="liste_vente.php">

<div class="client">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
</div>

<div class="produits">

<?php $i = 0; while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">
    <h3><?= $row["design"] ?></h3>
    <p class="prix"><?= $row["prix"] ?> FCFA</p>

    <input type="hidden" name="articles[<?= $i ?>][nom]" value="<?= $row["design"] ?>">
    <input type="hidden" name="articles[<?= $i ?>][prix]" value="<?= $row["prix"] ?>">
    Prix: <?= $row["prix"] ?> FCFA <br>
    Quantité: <input type="number" name="articles[<?= $i ?>][quantite]" value="0" min="0">
</div>
<hr>
<?php $i++; } ?>

</div>

<button type="submit" class="valider">Valider</button>

</form>
</div>

</body>
</html>