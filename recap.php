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
            echo"<p class='aucunProduit'>Aucun produit en session ...</p>";
        }
        else{
            echo "<div class='recapProduits'>",
                    "<h1>Récapitulatif des produits</h1>",
                    "<table>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Description</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                                "<th>Suppr.</th>",
                            "</th>",
                        "</thead>",
                        "<tbody>";
                $totalGeneral = 0;
                foreach($_SESSION['products'] as $index=>$product){ //$index est le numéro du produit & product les tableaux produit avec toutes leurs propriétés
                    $lienSuppr = "traitement.php?action=delete&id=".$index;
                    $lienPlus = "traitement.php?action=plus&id=".$index;
                    $lienMoins = "traitement.php?action=moins&id=".$index;
                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td>".$product["name"]."</td>",
                            "<td>".$product['description']."</td>",
                            "<td>".number_format($product["price"],2,",","&nbsp;")."&nbsp;€</td>", //"&nbsp;" correspond à un espace insécable (dans le cas de sauts de ligne, le € reste lié au nombre)
                            "<td><a href='$lienMoins' class='plusMoins'>-</a> ".$product["qtt"]." <a href='$lienPlus' class='plusMoins'>+</a></td>",
                            "<td>".number_format($product["total"],2,",","&nbsp;")."&nbsp;€</td>",
                            "<td><a href='$lienSuppr' class='deleteBtn'>Suppr</a></td>",
                        "</tr>";
                    $totalGeneral += $product['total'];
                }
                echo "<tr>",
                        "<td colspan=4>Total général : </td>", //colspan = pour fusionner des colonnes
                        "<td><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
                    "</tbody>",
                    "</table>",
                    "<a href='traitement.php?action=clear' class='deleteAll'>Tout Supprimer</a>",

                "</div>";
        }
    
    ?>
    <div class="navigation"><a href="index.php" class="toIndex"><= Vers Index</a></div>
    <div class="compteur">Nb de produits : <?php  
    
    if (isset($_SESSION['products'])){
        echo sizeof($_SESSION['products']); 
    }
    else{
        echo "0";
    }

    var_dump($_SESSION)
    ?>


</div>
</body>
</html>