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
    default:
    $error ="";
break;
    }
    return $error;
}