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
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['products'])|| empty($_SESSION['products'])){ //Si le tableau products rangé dans session est vide 
            echo"<p>Aucun produit en session ...</p>";
        }
        else{
            echo "<h1>Récapitulatif des produits</h1>",
                 "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</th>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index=>$product){ //$index est le numéro du produit & product les tableaux produit avec toutes leurs propriétés
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product["name"]."</td>",
                        "<td>".number_format($product["price"],2,",","&nbsp;")."&nbsp;€</td>", //"&nbsp;" correspond à un espace insécable (dans le cas de sauts de ligne, le € reste lié au nombre)
                        "<td>".$product["qtt"]."</td>",
                        "<td>".number_format($product["total"],2,",","&nbsp;")."&nbsp;€</td>",
                    "</tr>";
                $totalGeneral += $product['total'];
            }
            echo "<tr>",
                    "<td colspan=4>Total général : </td>", //colspan = pour fusionner des colonnes
                    "<td><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
                "</tbody>",
                "</table>";
        }
    
    ?>
    <p><a href="index.php"><= Vers Index</a></p>
</body>
</html>