<?php
 if(file_exists("db.php")){include("db.php");}
if(!empty($_GET['validation']))
{
    
    
    $validation = urldecode($_GET['validation']);
    $query = $db->prepare("SELECT  `u_nom`, `u_prenom`, `u_mail_hash`, `u_mail`, `u_mail_confirm` FROM users WHERE u_mail_hash = :u_mail_hash");
    $query->bindParam(":u_mail_hash", $validation);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if(!empty($row['u_mail']))
    {  

 //requete sql
 $sql = 'UPDATE users SET u_mail_hash=:u_mail_hash, u_mail_confirm=:u_mail_confirm WHERE u_mail =:u_mail';

 $query = $db->prepare($sql);//on prepare

 //on récupére les divers champs
     $u_mail = $row['u_mail'];
     $u_mail_hash = NULL;
     $u_mail_confirm =1;
     
     
 // Association des valeurs aux paramètres avec BindValue :
 $query->bindValue(":u_mail", $row['u_mail']);
 $query->bindValue(":u_mail_hash", $u_mail_hash);
 $query->bindValue(":u_mail_confirm", $u_mail_confirm);
 $success= $query->execute();//Exécution de la requête 

 if($success){
          header("Location: login.php?e=8");
        exit();
    }else{
        echo "une erreur c'est produite";
    }

    }else{
        header("Location: 404.php");
        exit();
    }
}
else
{
    header("Location: 404.php");
    exit();

}
?>