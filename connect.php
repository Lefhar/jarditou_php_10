<?php
session_start();

//si ya un cookie jarditou on recupére login et pass
if(!empty($_COOKIE['jarditou'])){
    $cookie = explode(":",$_COOKIE['jarditou']);
    $_SESSION['login'] = $cookie[0];
    $_SESSION['jeton'] = $cookie[1];
}

if (session_status() == PHP_SESSION_ACTIVE&&!empty($_SESSION["login"])&&!empty($_SESSION["jeton"])) {
 
 $query = $db->prepare("SELECT u_nom, u_prenom, u_d_connect, u_essai_connect, u_d_test_connect, u_mail FROM users WHERE u_mail = :u_mail and u_jeton_connect =:u_jeton_connect");
 $query->bindParam(":u_mail", $_SESSION['login']);
 $query->bindParam(":u_jeton_connect", $_SESSION['jeton']);
 $query->closeCursor();//on libére la mémoire
 $query->execute();
 $row = $query->fetch(PDO::FETCH_ASSOC);
 $query->closeCursor();//on libére la mémoire
}
else
{

 
        if(!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['connect'])&&$_POST['connect']=="yes")
        {

            $query = $db->prepare("SELECT u_mail, u_password, u_hash, u_essai_connect, u_d_test_connect, u_mail_confirm FROM users WHERE u_mail = :u_mail ");
            $query->bindParam(":u_mail", $_POST['email']);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();//on libére la mémoire


            if($row['u_mail_confirm']==0){
                header("Location:login.php?e=9");
                 exit();
              }


            // si ya eu plusieurs essai infructeux on fait patienter 15 minutes
            $endTime = strtotime("+15 minutes",strtotime($row['u_d_test_connect'] ));
            $time = strtotime(date('Y-m-d H:i:s'));

            if($row['u_essai_connect']>=3&&$endTime>=$time){
                header("Location:login.php?e=7");
                 exit();
              }
                if(password_verify(password($_POST['password'],$row['u_hash']),$row['u_password'])){

                    //remise à zero de l'essai de connexion
                     $u_essai_connect =0;  

                     //jeton de connexion
                    $jeton = password_hash(password(salt(12),salt(12)), PASSWORD_DEFAULT);

                     //requête
                     $sql = 'UPDATE users SET u_jeton_connect=:u_jeton_connect, u_d_connect=:u_d_connect, u_essai_connect =:u_essai_connect WHERE u_mail =:u_mail';

                    //préparation de la requête
                    $query = $db->prepare($sql);

                    // Association des valeurs aux paramètres avec BindValue :             
                    $query->bindValue(":u_jeton_connect", $jeton);
                    $query->bindValue(":u_d_connect", date('Y-m-d H:i:s'));
                    $query->bindValue(":u_essai_connect", $u_essai_connect);
                    $query->bindValue(":u_mail", $row['u_mail']);
                    $success= $query->execute();//Exécution de la requête 
                    if($success)
                    {
                    $_SESSION['login'] = $row['u_mail'];
                    $_SESSION['jeton'] = $jeton;
                    if (!empty($_POST['remember'])&&$_POST['remember']=="on") {
                    setcookie("jarditou", "". $row['u_mail'].":".$jeton."", time()+(60*60*24*7)); 
                    }
                    header("Location:index.php");
                    exit();
                    }
                }
                else
                {
                    if(!empty($row['u_mail'])){



                        $u_essai_connect = $row['u_essai_connect'] + 1;

                        $sql = 'UPDATE users SET u_d_test_connect=:u_d_test_connect, u_essai_connect = :u_essai_connect  WHERE u_mail =:u_mail';
                        $query = $db->prepare($sql);
                        // Association des valeurs aux paramètres avec BindValue :
                        $query->bindValue(":u_d_test_connect", date('Y-m-d H:i:s'));
                        $query->bindValue(":u_essai_connect", $u_essai_connect);
                        $query->bindValue(":u_mail", $row['u_mail']);
                        $success= $query->execute();//Exécution de la requête 

                    }else{
                       header("Location:login.php?e=6");
                    }

                }
          

        }

}
?>