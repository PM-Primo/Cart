<?php
    session_start(); //Ouverture de la session dans laquelle sont enregistrés les produits
?>

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
            <p class="elementForm">
                <label>
                    Nom du produit :
                    <input type="text" name="name" class="champTxt">
                </label>
            </p>
            <p class="elementForm">
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price" class="champTxt" min="0">
                </label>
            </p>
            <p class="elementForm">
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" class="champTxt" min="0">
                </label>
            </p>
            <p class="elementForm">
                <input type="submit" name="submit" value="Ajouter le produit" class="submitBtn">
            </p>

        </form>
        
        <div class="navigation"><a href="recap.php">Vers Recap =></a></div>
        <div class="compteur">Nb de produits : <?php  
        
            if (isset($_SESSION['products'])){
                echo sizeof($_SESSION['products']); 
            }
            else{
                echo "0";
            }
            ?>
        </div>
            
    
        <div class="message">
            <?php
    
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message']="";
                }
    
            ?>
        </div>
    </div>

    
</body>
</html>
