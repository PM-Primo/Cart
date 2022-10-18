<?php
    session_start(); //

    if(isset($_POST['submit'])){ //$_POST contient les données transmises au serveur par l'intermédiaire d'un formulaire // 'submit' = le nom du formulaire en question
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //on vérifie que l'utilisateur n'envoie pas de code malveillant
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //Vérifier que c'est bien un flottant + autoriser les points ET virgules comme séparateur décimal
        $qtt= filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); //vérifier que la qté est un entier
        //INPUT_POST = dire qu'on va chercher les infos dans le $_POST

        if($name && $price && $qtt){ //Si tout est rempli

            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

            $_SESSION["products"] []= $product; //on crée dans $_SESSION un tableau "products" dans lequel on range le produit créé par le formulaire
            
            $message = "Produit ajouté au panier";
            
        }
        else{
            $message = "Erreur ! Champs non remplis !";
        }
    }
    else{
        $message="Erreur ! Champs invalides !";
    }

    $_SESSION["message"] = $message;
    header("Location:index.php"); /*On renvoie à la page index après l'exécution du script*/

?>