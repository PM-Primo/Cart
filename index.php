<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
</head>
<body>
    <div class="ajoutProduit">

    <h1>Ajouter un produit</h1>
        <form action="traitement.php" method="post"> <!-- action="traitement.php" permet d'appeler la page traitement.php au moment du clic sur submit //  POST car formulaire -->
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name" class="champTxt">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price" class="champTxt" min="0">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" class="champTxt" min="0">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit" class="submitBtn">
            </p>

            <p><a href="recap.php" class="toRecap">Vers Recap =></a></p>



        </form>
    </div>

    
</body>
</html>
