<?php
//pour afficher les erreurs php
ini_set('display_errors', 1); 
error_reporting(E_ALL);  
include_once('db.php');
// var_dump($_POST);
// exit();
//on appel par l'id pour s'assurer que l'id est correcte
$pro_id = (int)$_POST['pro_id'];
$query = $db->prepare("SELECT pro_id, pro_cat_id, pro_libelle, pro_prix, pro_couleur, pro_photo, pro_description FROM produits WHERE pro_id = :pro_id ORDER BY pro_libelle");
$query->bindParam(":pro_id", $pro_id);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);


if(empty($row['pro_id']))//si sa retourne une erreur on renvoi sur l'erreur 404.php
{  
     header("Location: 404.php");
   exit();
}

//on vérifie les valeurs entré le nombre de caractére et pour les valeur numérique aussi exemple pro_stock, pro_prix etc
if(!empty($_POST['pro_libelle'])&&strlen($_POST['pro_libelle'])<=200&&!empty($_POST['pro_ref'])&&strlen($_POST['pro_ref'])<=10&&!empty($_POST['pro_stock'])&&strlen($_POST['pro_stock'])<=200
&&!empty($_POST['pro_couleur'])&&strlen($_POST['pro_couleur'])<=30&&!empty($_POST['pro_description'])&&strlen($_POST['pro_description'])<=1000&&
!empty($_POST['pro_img'])&&!empty($_POST['pro_prix'])&&is_numeric($_POST['pro_prix'])&&!empty($_POST['cat_id'])&&
is_numeric($_POST['cat_id']))
{

    try 
    {

      //requete sql
        $sql = 'UPDATE produits SET 
        pro_cat_id =:pro_cat_id,
         pro_ref =:pro_ref, 
         pro_libelle =:pro_libelle,
          pro_prix =:pro_prix,
           pro_stock=:pro_stock,
            pro_couleur =:pro_couleur,
             pro_photo =:pro_photo,
              pro_description =:pro_description,
               pro_d_modif=:pro_d_modif,
                pro_bloque=:pro_bloque 
                WHERE pro_id =:pro_id';
    
        $query = $db->prepare($sql);//on prepare

        //on récupére les divers champs
            $id = $row['pro_id'];
            $cat_id = $_POST['cat_id'];
            $pro_ref = $_POST['pro_ref'];
            $pro_libelle = $_POST['pro_libelle'];      
            $pro_prix = $_POST['pro_prix'];      
            $pro_stock = $_POST['pro_stock'];
            $pro_couleur = $_POST['pro_couleur'];      
            $info = new SplFileInfo($_POST['pro_img']);
            $pro_photo = $info->getExtension(); 
            $pro_description = $_POST['pro_description'];  
            $pro_d_modif = date("Y-m-d H:i:s");     
            $pro_bloque = (int)$_POST['pro_bloque']; 
            
            
        // Association des valeurs aux paramètres avec BindValue :
        $query->bindValue(":pro_cat_id", $cat_id);
        $query->bindValue(":pro_libelle", $pro_libelle);
        $query->bindValue(":pro_prix", $pro_prix);
        $query->bindValue(":pro_ref", $pro_ref);
        $query->bindValue(":pro_stock",$pro_stock);
        $query->bindValue(":pro_couleur", $pro_couleur);
        $query->bindValue(":pro_photo", $pro_photo);
        $query->bindValue(":pro_description", $pro_description);
        $query->bindValue(":pro_d_modif", $pro_d_modif);
        $query->bindValue(":pro_bloque", $pro_bloque);
        $query->bindValue(":pro_id", $id);

        $success= $query->execute();//Exécution de la requête 

        if($success)
        {
        header("Location: index.php");// si ya bien requéte on fait la redirection sur le produit
        exit();
        }
        else
        {
        header("Location: update_form.php?pro_id=".$row['pro_id']."&e=1");// si ya une erreur on renvoi avec le get e numéro 1
        }
      

      }  
      catch (Exception $e) // Gestion des erreurs
      {
        
            echo "La connexion à la base de données a échoué ! <br>";
            echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
      } 

}
else
{
  header("Location: update_form.php?pro_id=".$row['pro_id']."&e=1");// si ya une erreur on renvoi avec le get e numéro 1
}
$query->closeCursor();//on libére la mémoire
?>