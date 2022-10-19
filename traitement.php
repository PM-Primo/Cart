<?php
    session_start();

    if(isset($_GET['action'])){

        switch($_GET['action']){

            case "add":

                if(isset($_POST['submit'])){ //$_POST contient les données transmises au serveur par l'intermédiaire d'un formulaire // 'submit' = le nom du formulaire en question
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //on vérifie que l'utilisateur n'envoie pas de code malveillant
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //Vérifier que c'est bien un flottant + autoriser les points ET virgules comme séparateur décimal
                    $qtt= filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); //vérifier que la qté est un entier
                    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    //INPUT_POST = dire qu'on va chercher les infos dans le $_POST
            
                    if($name && $price && $qtt && $description){ //Si tout est rempli
            
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "description" => $description,
                            "total" => $price*$qtt
                        ];
            
                        $_SESSION["products"] []= $product; //on crée dans $_SESSION un tableau "products" dans lequel on range le produit créé par le formulaire
                        
                        $message = "<div class='messageValid'>Produit ajouté au panier</div>";
                        
                    }
                    else{
                        $message = "<div class='messageErreur'>Erreur ! Champs non remplis !</div>";
                    }
                }
                else{
                    $message="<div class='messageErreur'>Erreur ! Champs invalides !</div>";
                }
            
                $_SESSION["message"] = $message;
                header("Location:index.php"); /*On renvoie à la page index après l'exécution du script*/

                break;

            case "delete":

                if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                    $index=$_GET['id'];
                    unset($_SESSION['products'][$index]);
                    $_SESSION['products'] = array_values($_SESSION['products']);
                }
                header("Location:recap.php");
                break;

            case "clear":

                $_SESSION["products"] = [];
                header("Location:recap.php");
                break;

            case "plus":

                if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                    $index=$_GET['id'];
                    $_SESSION['products'][$index]['qtt']++;
                    $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt']*$_SESSION['products'][$index]['price'];
                }
                header("Location:recap.php");
                break;

            case "moins":
                
                if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                    
                    $index=$_GET['id'];

                    if($_SESSION['products'][$index]['qtt']>1){
                        $_SESSION['products'][$index]['qtt']--;
                        $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt']*$_SESSION['products'][$index]['price'];
                    }
                    elseif($_SESSION['products'][$index]['qtt']==1){
                        unset($_SESSION['products'][$index]);
                        $_SESSION['products'] = array_values($_SESSION['products']);
                    }

                }
                header("Location:recap.php");
                break;

        }



    }


?>