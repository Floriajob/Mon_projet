<?php
include("login_traitement.php");

if(isset($_POST['valider'])){
    $nombre=$_POST['nombre'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ajouter client</title>
</head>
<style>
     body{
        font-family: Arial, sans-serif;
        margin:0;
        padding:0;
        background: linear-gradient(135deg, #ff7e5f, #feb47b);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .container{
        width: 400px;
        background: white;
        padding: 40px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0px 10px 30px rgba(0,0,0,0.3);
    }

    h1{
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    form{
        margin-top: 20px;
    }
    .nbrclient{
        width: 95%;
    }

    input{
        width: 90%;
        padding: 12px;
        margin-top: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 16px;
    }

    button{
        width: 95%;
        padding: 12px;
        background: #27ae60;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
        margin-top: 20px;
        font-weight: bold;
    }

    button:hover{
        background: #219150;
    }

    

</style>
<body>
    <div class="container">
        <h1>Ajout de Clients</h1>
        <form method="POST" action="fiche_client.php">
            <label>Combien de clients voulez-vous ajouter ?</label>
            <br>
            <input type="number" name="nombre" required min="1">
            <button type="submit" name="valider">Valider</button>
        </form>
    </div>
</body>
</html>