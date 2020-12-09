<?php 
include_once('db.php');
//on vérifie les valeurs entré le nombre de caractére et pour les valeur numérique aussi exemple pro_stock, pro_prix etc
if(is_numeric($_POST['pro_prix'])&&!empty($_POST['cat_id'])
&&!empty($_POST['pro_libelle'])&&strlen($_POST['pro_libelle'])<=200
&&!empty($_POST['pro_ref'])&&strlen($_POST['pro_ref'])<=10
&&!empty($_POST['pro_stock'])&&strlen($_POST['pro_stock'])<=200
&&!empty($_POST['pro_couleur'])&&strlen($_POST['pro_couleur'])<=30
&&!empty($_POST['pro_description'])&&strlen($_POST['pro_description'])<=1000
&&!empty($_POST['pro_img'])
&&!empty($_POST['pro_prix'])&&is_numeric($_POST['pro_prix'])
&&!empty($_POST['cat_id'])&&is_numeric($_POST['cat_id']))
{
  

    try 
    {

      //requete sql
      $sql = 'INSERT INTO produits 
      (pro_cat_id, pro_libelle, pro_ref, pro_prix, pro_stock, pro_couleur, pro_photo, pro_description, pro_d_ajout)  VALUES 
       (:pro_cat_id, :pro_libelle, :pro_ref, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, :pro_description, :pro_d_ajout)';
    
      $query = $db->prepare($sql);//on prepare

      //on récupére les divers champs
          $cat_id = $_POST['cat_id'];
          $pro_libelle = $_POST['pro_libelle'];      
          $pro_ref = $_POST['pro_ref'];      
          $pro_prix = $_POST['pro_prix'];      
          $pro_stock = $_POST['pro_stock'];
          $pro_couleur = $_POST['pro_couleur'];      
          $info = new SplFileInfo($_POST['pro_img']);
          $pro_photo = $info->getExtension(); 
          $pro_description = $_POST['pro_description'];  
          $pro_d_modif = date("Y-m-d");     

        // Association des valeurs aux paramètres avec BindValue :
        $query->bindParam(":pro_cat_id", $cat_id);
        $query->bindParam(":pro_libelle", $pro_libelle);
        $query->bindParam(":pro_ref", $pro_ref);
        $query->bindParam(":pro_prix", $pro_prix);
        $query->bindParam(":pro_stock",$pro_stock);
        $query->bindParam(":pro_couleur", $pro_couleur);
        $query->bindParam(":pro_photo", $pro_photo);
        $query->bindParam(":pro_description", $pro_description);
        $query->bindParam(":pro_d_ajout", $pro_d_modif);

        $success= $query->execute();//Exécution de la requête 
        $query->closeCursor();//on libére la mémoire
     
        if($success)
        {
        header("Location: index.php");// si ya bien requéte on fait la redirection sur le produit
        exit();
        }
        else
        {
        header("Location: add_form.php?e=2");// si ya une erreur on renvoi avec le get e numéro 1
        exit();
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

}else{
  header("Location: add_form.php?e=2");// si ya une erreur on renvoi avec le get e numéro 1
  exit();
}
?>