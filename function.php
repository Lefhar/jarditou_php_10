<?php
function error($id){

    switch($id){
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
    default:
    $error ="";
break;
    }
    return $error;
}

function salt($number){
if(!empty($number)&&$number>=10){
  $salt = random_bytes($number);
 
  return bin2hex($salt) ;
}
}
function password($password,$salt){
  $resultat="";
  if(!empty($salt)&&!empty($password)){
$resultat = "?@".$salt."_@".$password."_@".$salt;

  }
  return $resultat;
}