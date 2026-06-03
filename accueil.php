<!DOCTYPE html>
<html>
<head>
<title>Accueil</title>

<style>
    body{
        font-family: Arial, sans-serif;
        margin: 0;
        background: linear-gradient(135deg, #9472ce, #89ccdf);
    }

    header{
        background: linear-gradient(90deg, #003366, #0055aa);
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 40px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    header h1{
        font-size: 26px;
        letter-spacing: 1px;
    }

    header img{
        width:100px;
        height:100px;
        object-fit: contain;
        background: white;
        padding: 5px;
        border-radius: 10px;
    }

    .menu{
        text-align: center;
        margin-top: 60px;
    }

    .menu a{
        display:block;
        width:320px;
        margin:20px auto;
        padding:20px;
        background: white;
        color: #003366;
        text-decoration:none;
        border-radius:15px;
        font-size:20px;
        font-weight: bold;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .menu a:hover{
        background: #2a5298;
        color: white;
        transform: translateY(-5px) scale(1.03);
        box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    }

    /* petit effet lumineux */
    .menu a::before{
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255,255,255,0.2);
        transition: 0.5s;
    }

    .menu a:hover::before{
        left: 100%;
    }
    .intro{
        text-align: center;
        margin-top: 40px;
        padding: 20px;
    }

    .intro h2{
        color: #003366;
        font-size: 28px;
        margin-bottom: 10px;
    }

    .intro p{
        font-size: 18px;
        color: #333;
        max-width: 700px;
        margin: 10px auto;
        line-height: 1.6;
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

    <header>
        <img src="images/logo_uac.caf5b669.png" alt="Logo UAC">
        <h1>Bienvenue sur ma plateforme</h1>
        <img src="images/ENEAM-logo-300x243.png" alt="Logo ENEAM">
    </header>
    <div class="intro">
        <h2>Gestion commerciale simplifiée</h2>
        <p>
            Bienvenue sur votre plateforme de gestion commerciale.
            Ici, vous pouvez gérer facilement les utilisateurs, les clients,
            les articles ainsi que les ventes en toute simplicité.
        </p>
        <p>
            Une solution rapide, efficace et organisée pour suivre
            toutes vos opérations commerciales en un seul endroit.
        </p>
    </div>
    <div class="menu">
        <a href="liste_user.php">Liste utilisateurs</a>
        <a href="Voir_article.php">Liste articles</a>
        <a href="Voir_client.php">Liste clients</a>
        <a href="vente.php">Effectuer vente</a>
        <a href="liste_vente.php">Liste ventes</a>
    </div>
    <footer class="footer">
        <p>&copy; 2026 Plateforme de Gestion Commerciale - Tous droits réservés</p>
        <p>Développé pour la gestion des utilisateurs, clients, articles et ventes</p>
    </footer>
</body>
</html>