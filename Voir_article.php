<?php
$conn = new mysqli("localhost", "root", "", "essaiebdd");

if ($conn->connect_error) {
    die("Erreur connexion: " . $conn->connect_error);
}

// INSERTION
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id_article'];
    $design = $_POST['design'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];

    $sql = "INSERT INTO article (id_article, design, prix, categorie) VALUES ('$id', '$design', '$prix', '$categorie')";

    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des articles</title>

    <style>
        body {
            font-family: Arial;
            background-color: #eef;
            margin: 0;
            padding: 0;
            flex-direction: column;
            display: flex;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        h2 {
            text-align: center;
            font-family: "Times New Roman", Times, sans-serif;
        }
        .footer{
        margin-top: 80px;
        background: #003366;
        color: white;
        text-align: center;
        padding: 20px;
        font-size: 14px;
    }

    .footer p{
        margin: 5px 0;
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
    .ajouter{
        background: #27ae60;
    }
    .ajouter: hover{
        background: #219150
    }
    .boutons{
       display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        margin: 10px; 
    }
    </style>
</head>

<body>

    <h2>Liste des articles (par catégorie)</h2>
    <div class="boutons">
        <a href="ajout_article.php" class="ajouter"><button>Ajouter</button></a>
        <a href="accueil.php" class="quitter"><button>Quitter</button></a>
    </div>
    <table>
    <tr>
    <th>Code Article</th>
    <th>Description</th>
    <th>Prix</th>
    <th>Catégorie</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM article ORDER BY categorie");

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row['id_article']."</td>
        <td>".$row['design']."</td>
        <td>".$row['prix']."FCFA</td>
        <td>".$row['categorie']."</td>
        <td>
            <a href='modifier_prix.php? id=".$row['id_article']."'>Modifier</a> </td>
    </tr>";
}
?>

</table>
<footer class="footer">
    <p>&copy; 2026 Plateforme de Gestion Commerciale - Tous droits réservés</p>
    <p>Développé pour la gestion des utilisateurs, clients, articles et ventes</p>
</footer>

</body>
</html>