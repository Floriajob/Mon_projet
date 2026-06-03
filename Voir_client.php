<?php
include("login_traitement.php");

$result=mysqli_query($conn,"SELECT * FROM client");
?>

<!DOCTYPE html>
<html>
<head>
<title>Liste clients</title>
</head>
<style>
    body{
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #605492, #c0fac2);
        margin: 0;
        padding: 0;
        flex-direction: column;
        display: flex;
    
    }
    .container{
        width: 85%;
        margin: 50px auto;
        background: #95b0eb;
        padding: 30px;
        border-raduis: 15px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.3);
        text-align: center;
    }
    h1{
        text-align: center;
        color: #2c3e50;
        margin-bottom: 25px;
    }
    table{
        padding: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        
    }
    table th{
        background: #3498db;
        color: white;
        padding: 15px;
        font-size: 18px;
        text-align: center;
    }
    table td{
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }
    table tr: nth-child(even){
        background: #f2f2d4
        text-align: center;
    }
    table tr: hover{
        background: #dff9fb;
        transform: scale(1.01);
        transition: 0.3s;
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
</style>
<body>
        <div class="boutons">
            <a href="accueil.php" class="quitter">Quitter</a>
            <a href="ajout_client.php" class="ajouter">Ajouter</a>
        </div>
        <div class="container">
            <h1>Liste des clients</h1>
        </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Email</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($result)){ ?>

        <tr>
            <td><?= $row['id_client'] ?></td>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['adresse'] ?></td>
            <td><?= $row['ville'] ?></td>
            <td><?= $row['mail'] ?></td>
        </tr>

        <?php } ?>

    </table>
    <footer class="footer">
        <p>&copy; 2026 Plateforme de Gestion Commerciale - Tous droits réservés</p>
        <p>Développé pour la gestion des utilisateurs, clients, articles et ventes</p>
    </footer>
</body>
</html>