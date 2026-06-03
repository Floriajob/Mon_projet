<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Connexion</title>

<style>
    body{
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #e3edf7, #f2f2f2);
        margin: 0;
    }
    h2{
        text-align: center;
        font-family: "Times New Roman", Times, sans-serif;
        font-size: 50px;
        color: #003366;
        margin-bottom: 20px;
    }

    .box{
        width:500px;
        margin:100px auto;
        background:white;
        padding:60px;
        border-radius:15px;
        font-size: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        transition: 0.3s;
    }
    .box:hover{
        transform: translateY(-5px);
    }

    input{
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 10px;
        outline: none;
        transition: 0.3s;
    }
    input:focus{
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0,123,255,0.3);
    }

    .button-container{
        display:flex;
        gap: 20px;
        width: 100%;
        justify-content: space-between;
        margin-top: 15px;
    }
    .button-container button{
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-raduis: 30px;
        cursor: pointer; 
        font-size: 16px;
        transition: 0.3s;
    }
    .btn-connecter{
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: white;
    }
    .btn-inscrire-link{
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px;
        border-radius: 25px;
        background: linear-gradient(90deg, #28a745, #1e7e34);
        color: white;
        text-decoration: none;
        font-size: 16px;
        transition: 0.3s;
    }

    .btn-inscrire-link:hover{
        transform: scale(1.05);
        opacity: 0.9;
    }
    .btn-inscrire{
        background: linear-gradient(90deg, #28a745, #1e7e34);
        color: white;
    }

    /* HOVER BOUTONS */
    .button-container button:hover{
        transform: scale(1.05);
        opacity: 0.9;
    }

    /* RESPONSIVE */
    @media (max-width: 500px){
        .box{
            width: 90%;
            padding: 30px;
        }
    }

</style>
</head>
<body>
    <div class="box">
        <h2>Connexion</h2>
        <form action="login_traitement.php" method="POST">
            Login:<input type="text" name="login" required> <br>
            Mot de passe:<input type="password" name="password" required>
            <div class= "button-container">
                <a href="accueil.php"><button class="btn-connecter" type="submit" name="connecter">Se connecter</button></a><br>
                <a href="register.php" class="btn-inscrire-link">S'inscrire</a>
            </div> 
        </form>
    </div>
</body>
</html>