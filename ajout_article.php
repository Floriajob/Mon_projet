<!DOCTYPE html>
<html>
<head>
    <title>Formulaire Article</title>
    <meta charset="UTF-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 450px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.3);
            transform: scale(1.05);
        }

        input,select {
             width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background: #f1f5ff;
            font-size: 16px;
            transition: 0.3s;
        }

        button {
            width: 100%;
            padding: 15px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            border-radius: 8px;
            font-size: 18px;
            background: linear-gradient(90deg, #ff512f, #dd2476);
            transition: 0.3s;
        }
        button:hover {
            background: darkgreen;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: gray;
        }
        h2{
            text-align: center;
            color: #2a5298;
            margin-bottom: 20px;
            font-size: 26px;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ajouter un article</h2>
        <form action="Voir_article.php" method="POST">
            <input type="text" name="id_article" placeholder="Code article" required>
            <input type="text" name="design" placeholder="Description" required>
            <input type="number" step="0.01" name="prix" placeholder="Prix" required>
            <input type="text" name="categorie" placeholder="Catégorie" required>
            <button type="submit">Enregistrer</button>
        </form>
         <div class="footer">
            Gestion des articles©2026
        </div>
    </div>
</body>
</html>