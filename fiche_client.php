<?php
if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}else{
    header("Location: ajout_client.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fiches clients</title>

<style>
    body{
        margin:0;
        padding:0;
        font-family: Arial;
        background: linear-gradient(135deg,#1d2671,#c33764);
    }

    .container{
        width:80%;
        margin:30px auto;
        background:white;
        padding:30px;
        border-radius:20px;
        box-shadow:0px 10px 25px rgba(0,0,0,0.3);
    }

    h1{
        text-align:center;
        color:#2c3e50;
        margin-bottom:30px;
    }

    .client-box{
        background:#f8f9fa;
        padding:20px;
        margin-bottom:20px;
        border-radius:15px;
        border-left:6px solid #3498db;
    }

    h3{
        color:#3498db;
    }

    .input-group{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:15px;
    }

    input{
        width:70%;
        padding:12px;
        border:1px solid #ccc;
        border-radius:10px;
        font-size:15px;
    }

    input:focus{
        border-color:#3498db;
        outline:none;
        box-shadow:0px 0px 8px rgba(52,152,219,0.5);
    }

    .age-box{
        display:flex;
        align-items:center;
        gap:10px;
    }

    .save-btn{
        width:100%;
        padding:15px;
        background:#27ae60;
        color:white;
        border:none;
        border-radius:10px;
        font-size:18px;
        cursor:pointer;
        font-weight:bold;
    }

    .save-btn:hover{
        background:#219150;
    }
</style>
</head>

<body>

    <div class="container">
        <h1>Informations des clients</h1>
        <form method="POST" action="enregistrement_client.php">

            <?php
            for($i=1;$i<=$nombre;$i++){
            ?>
            
            <div class="client-box">
                <h3>Client <?= $i ?></h3>

                <div class="input-group">
                    <input type="text" name="nom[]" placeholder="Nom" required>
                    <input type="text" name="prenom[]" placeholder="Prénom" required>
                    
                    <div class="age-box">
                        <input type="number" name="age[]" placeholder="Age" min="0" required>
                        <span>ans</span>
                    </div>

                    <input type="text" name="adresse[]" placeholder="Adresse" required>
                    <input type="text" name="ville[]" placeholder="Ville" required>
                    <input type="email" name="mail[]" placeholder="Email" required>
                </div>
            </div>

            <?php
            }
            ?>

            <button class="save-btn" name="save">
                Enregistrer tous les clients
            </button>

        </form>
    </div>

</body>
</html>