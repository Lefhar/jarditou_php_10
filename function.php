<?php

//fonction pour l'affichage des erreurs 
function error($id)
{

        switch($id)
        {
            case 1;
            $error = '<div class="alert alert-danger" role="alert">
            Vous avez fait une erreur dans la modification veuillez bien vérifier tout les champs!
            </div>';
            break;

            case 2;
            $error = '<div class="alert alert-danger" role="alert">
            Vous avez fait une erreur dans l\'ajout du produit vérifier tout les champs!
          </div>';
            break;

            case 3;
            $error = '<div class="alert alert-danger" role="alert">
            Une erreur c\'est produite lors de la suppréssion du produit vérifiez que tout est correct!
          </div>';
            break;

            case 4;
            $error = '<div class="alert alert-danger" role="alert">
            Une erreur c\'est produite lors de votre inscription cette email existe déjà vous pouvez vous <a href="login.php">Connecter</a>!
          </div>';
            break;

            case 5;
            $error = '<div class="alert alert-danger" role="alert">
            Une erreur c\'est produite lors de votre inscription vérifiez que tout est correct!
          </div>';
            break;

            case 6;
            $error = '<div class="alert alert-danger" role="alert">
          Identifiant ou mot de passe faux!
          </div>';
            break;

            case 7;
            $error = '<div class="alert alert-danger" role="alert">
          Vous allez devoir attendre 15 minutes avant un nouvelle essai!
          </div>';
            break;

            case 8;
            $error = '<div class="alert alert-success" role="alert">
          Merci vous pouvez à présent vous connecter!
          </div>';
            break;
            case 9;
            $error = '<div class="alert alert-danger" role="alert">
          Vous devez valider votre adresse email veuillez vérifier votre boite email merci ! rien reçu ? <a href="login.php?resend=yes">renvoyer la confirmation</a> 
          </div>';
            break;
            case 10;
            $error = '<div class="alert alert-danger" role="alert">
          une erreur c\'est produite nous avons pas pus renvoyer la confirmation!
          </div>';
            break;


            default:
            $error ="";
            break;

        }
    return $error;
}

//génére des caractéres alphanumérique aléatoire en fonction du nombre mis pour la valeur number
function salt($number)
{
    if(!empty($number)&&$number>=10){
      $salt = random_bytes($number);
      return bin2hex($salt) ;
    }
}

//fonction pour assembler le mot de passe et le sel avec des symboles en plus
function password($password,$salt)
{
      $resultat="";
    if(!empty($salt)&&!empty($password))
    {
      $resultat = "?@".$salt."_@".$password."_@".$salt;

    }
  return $resultat;
}