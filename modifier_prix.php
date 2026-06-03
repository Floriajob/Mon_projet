<?php

$conn = new mysqli("localhost","root","","essaiebdd");

$id = $_GET['id'];

if(isset($_POST['modifier'])){

    $nouveauPrix = $_POST['prix'];

    $sql = "UPDATE article
            SET prix='$nouveauPrix'
            WHERE id_article='$id'";

    $conn->query($sql);

    header("Location: Voir_article.php");
    exit();
}

$result = $conn->query(
"SELECT * FROM article WHERE id_article='$id'"
);

$article = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Prix</title>
</head>
<body>
     <style>
        body {
            font-family: Arial, sans-serif;
            background: #403289;
            height: 80vh;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            width: 50%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #a28312;
            display: block;
            width: 100%;
        }

        p {
            font-size: 18px;
            margin-bottom: 80px;
            margin-top: 5px;
        }
        .article{
            font-size: 20px;
            margin-bottom: 10px;
            margin-top: 50px;
        }

        input[type="number"] {
            width: 20%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        input[type="number"]:focus {
            border-color: #007bff;
        }

        button {
            width: 20%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 20px;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
    <h2>Modifier le prix</h2>

    <form method="POST">

        <p class ="article">Article : <?= $article['design'] ?></p>

        <input type="number" step="0.01" name="prix" value="<?= $article['prix'] ?>"required>

        <button type="submit" name="modifier">
            Enregistrer
        </button>

    </form>

</body>
</html>