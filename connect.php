<?php
session_start();
if (session_status() == PHP_SESSION_ACTIVE&&!empty($_SESSION["login"])&&!empty($_SESSION["jeton"])) {
    header("Location:index.php");
    exit;
}
else
{

    echo "avant poste connect";
    var_dump($_POST);
        if(!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['connect'])&&$_POST['connect']=="yes")
        {
            echo "poste connect";
            $query = $db->prepare("SELECT u_mail, u_password, u_hash FROM users WHERE u_mail = :u_mail ");
            $query->bindParam(":u_mail", $_POST['email']);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();//on libére la mémoire
          echo "teste affiche password".password($_POST['password'],$row['u_hash']);
            
      if(password_verify(password($_POST['password'],$row['u_hash']),$row['u_password'])){
          echo "sa correspond";
      }
          

        }

}
?>