<?php
include("login_traitement.php");
$result=mysqli_query($conn,"SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes de tous les utilisateurs</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body{
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            padding: 30px;
        }

        /*titre*/
        h1{
            text-align: center;
            color: white;
            margin-bottom: 30px;
            font-size: 35px;
        }

        /*bouton quitter*/
        .btn-retour{
            background:red;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-raduis: 10px;
            font-weight: bold;
            display: inline-block;
            margin-bottom:20px;
        }
        .btn-retour:hover{
            background: darkred;
        }

        .table-container{
            width: 85%;
            margin: auto;
            background: white;
            padding: 20px;
            border-raduis: 20px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.4);
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th{
            background: #003366;
            color: white;
            padding: 15px;
            font-size: 18px;
        }
        td{
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        tr:hover{
            background: #f2f2f2;
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
</head>
<body>
    <a href="accueil.php" class="btn-retour">Quitter</a>
    <h1>Liste des utilisateurs</h1>
    <div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Contact</th>
            <th>Login</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?= str_pad($row['id'], 3, "0", STR_PAD_LEFT)?></td>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['contact'] ?></td>
            <td><?= $row['login'] ?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
    <footer class="footer">
        <p>&copy; 2026 Plateforme de Gestion Commerciale - Tous droits réservés</p>
        <p>Développé pour la gestion des utilisateurs, clients, articles et ventes</p>
    </footer>
</body>
</html>

