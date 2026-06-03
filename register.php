<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">
<title>Inscription</title>
<style>
    body{
        font-size: 16px;
        font-family: Arial, sans-serif;
        margin: 0;
        background: linear-gradient(135deg, #3c6791, #a26363);
    }
    input{
        text-align: left;
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        outline: none;
        transition: 0.3s;
    }

    input:focus{
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0,123,255,0.3);
    }

    button{
        font-size: 20px;
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 25px;
        background: linear-gradient(90deg, #6776b5, #3b4a8a);
        color: white;
        cursor: pointer;
        transition: 0.3s;

    }

    button:hover{
        transform: scale(1.03);
        opacity: 0.9;
    }

    /* RESPONSIVE */
    @media (max-width: 500px){
        form{
            width: 90%;
        }
    }
    h2{
        text-align: center;
        font-size: 20px;
        color: #003366;
        margin-top: 30px;
    }
    form{
         width: 420px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    form{
        font-size: 16px;
        color: #333;
    }
</style>
</head>
<body>
    <h2>Formulaire d'inscription</h2>
    <div>
        <form method="POST" action="register_traitement.php">
            Nom: <input type="text" name="nom" required> <br> <br>
            Prénom: <input type="text" name="prenom" required> <br><br>
            Contact: <input id="phone" type="tel" name="contact" required><br><br>
            Login: <input type="text" name="login" required> <br><br>
            Mot de passe: <input type="password" name="password" required> <br><br>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

    <script>
    const input = document.querySelector("#phone");

    window.intlTelInput(input, {
        initialCountry: "bj",   // Bénin par défaut
        separateDialCode: true, // affiche +229 séparé
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });
    </script>
</body>
</html>