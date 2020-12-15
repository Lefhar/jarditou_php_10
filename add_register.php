<?php 
ini_set("SMTP","127.0.0.1");
ini_set("smtp_port","1025");
ini_set("sendmail_path","C:/wamp64/mailhog/mailhog.exe sendmail");
include("db.php");
include("function.php");
if (session_status() == PHP_SESSION_ACTIVE) {
    header(" account.php");
    exit();
}else{
    var_dump($_POST);
    if(!empty($_POST['nom'])
    &&preg_match("`^[a-zA-Z]{2,}$`",$_POST['nom'])
    &&!empty($_POST['prenom'])
    &&preg_match("`^[a-zA-Z]{2,}$`",$_POST['prenom'])
    &&!empty($_POST['cp'])
    &&preg_match("`^[0-9]{4,5}$`",$_POST['cp'])
    &&!empty($_POST['email'])
    &&preg_match("`^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$`",$_POST['email'])
    &&!empty($_POST['password'])
    &&preg_match("`^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{12,})$`",$_POST['password'])
    &&!empty($_POST['confirpassword'])
    &&$_POST['password'] == $_POST['confirpassword']
    )
    {

       if(!empty($_POST['adresse'])&&preg_match("/[0-9]{1,}\s+[a-z]{2,}\s+[a-z]{2,}/",$_POST['adresse']))//étant pas obligatoire on vérifier uniquement si on post l'adresse sinon null
       {
        $adresse = $_POST['adresse'];
       }
       else
       {
           $adresse = null;
       }

       if(!empty($_POST['ville'])&&preg_match("`^[a-zA-Z]{1,}$`",$_POST['ville']))//étant pas obligatoire on va vérifier uniquement si on post la ville sinon null
       {
        $ville = $_POST['ville'];
       }
       else
       {
           $ville = null;
       }

       
       if(!empty($_POST['cp'])&&preg_match("`^[0-9]{4,5}$`",$_POST['cp']))//étant pas obligatoire on va vérifier uniquement si on post le code postal sinon null
       {
        $cp = $_POST['cp'];
       }
       else
       {
           $cp = null;
       }

       if(!empty($_POST['tel'])&&preg_match("`^[0-9]{10}$`",$_POST['tel']))//étant pas obligatoire on va vérifier uniquement si on post le code postal sinon null
       {
        $tel = $_POST['tel'];
       }
       else
       {
           $tel = null;
       }

            $salt = salt(12);
            $password_hash = password_hash(password($_POST['password'],$salt), PASSWORD_DEFAULT);// on appel la fonction password comme sa on reprend la même méthode d'assemblage du sel et du mot de passe 
            $u_d_create = date('Y-m-d H:i:s');
            $validation = password_hash(password($salt,$salt), PASSWORD_DEFAULT);
            //requête chercher l'email en base
            $query = $db->prepare("SELECT u_mail FROM users WHERE u_mail = :u_mail ");
            $query->bindParam(":u_mail", $_POST['email']);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();//on libére la mémoire


                    // on vérifie par une condition si sa existe déjà
                    if(!empty($row['u_mail'])){
                        header("Location: register.php?e=4");
                        exit();
                    }
  

            $sql = 'INSERT INTO users 
            (u_nom, u_prenom, u_adresse, u_cp, u_city, u_tel, u_sexe, u_mail , u_mail_hash, u_password, u_hash, u_d_create)  VALUES 
                (:u_nom, :u_prenom, :u_adresse, :u_cp, :u_city, :u_tel, :u_sexe, :u_mail, :u_mail_hash, :u_password, :u_hash, :u_d_create)';


                    $query = $db->prepare($sql);//on prepare
                            // Association des valeurs aux paramètres avec BindValue :
                $query->bindParam(":u_nom", $_POST['nom']);
                $query->bindParam(":u_prenom",$_POST['prenom']);
                $query->bindParam(":u_adresse", $adresse);
                $query->bindParam(":u_cp", $cp);
                $query->bindParam(":u_city",$ville);
                $query->bindParam(":u_tel", $tel);
                $query->bindParam(":u_sexe", $_POST['sexe']);
                $query->bindParam(":u_mail", $_POST['email']);
                $query->bindParam(":u_mail_hash",$validation);
                $query->bindParam(":u_password",$password_hash);
                $query->bindParam(":u_hash", $salt);
                $query->bindParam(":u_d_create", $u_d_create);

                $success= $query->execute();//Exécution de la requête 
                $query->closeCursor();//on libére la mémoire

                    if($success)
                    {
                        $header = array('MIME-Version' => '1.0',
                        'Content-Type' => 'text/html; charset=utf-8',
                        'From' => ''.$_POST['prenom'].' '.$_POST['nom'].' <'.$_POST['email'].'>',
                        'Reply-To' => 'Service commercial <commerciaux@jarditou.com>',
                        'X-Mailer' => 'PHP/' . phpversion()
                        );
                        $message = "<!DOCTYPE html>
                        <html lang='fr'>
                        <head>
                        <meta charset='utf-8'>
                        <title>Confirmer votre adresse email</title>   
                        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
                        <link rel='stylesheet' href='assets/css/style.css'>
                            <title>Confirmer votre adresse email</title>
                        </head>
                        <body>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-12'>
                                  <h1>Confirmez votre adresse email</h1>
                              </div>    
                            </div>   
                            <div class='row'>
                                <div class='col-12'>
                                 <p><a href='//".$_SERVER['HTTP_HOST']."/confirm_mail.php?validation=".urlencode($validation)."' > Confirmez votre adresse email</a></p>
                                 si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien http://".$_SERVER['HTTP_HOST']."/confirm_mail.php?validation=".urlencode($validation)."
                              </div>    
                            </div>   
                            <div class='row'>
                                <div class='col-12'>
                                  <img src='//".$_SERVER['HTTP_HOST']."/src/img/jarditou_logo.jpg' title='Logo' alt='Logo' class='img-fluid'>
                                </div>    
                            </div>   
                        </div> 
                          
                        <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
                        <script src='//".$_SERVER['HTTP_HOST']."/assets/js/script.js'></script>
                        <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
                        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
                        </body>
                        </html>";


                        if(!mail($_POST['email'], "Confirmez votre email", $message, $header)){
                           // header("Location: register.php?e=5");// si ya une erreur on renvoi avec le get e numéro 5
                            exit();
                        }
                    header("Location: login.php");// si ya bien requéte on fait la redirection sur le produit
                    exit();
                    }
                    else
                    {
                    header("Location: register.php?e=5");// si ya une erreur on renvoi avec le get e numéro 5
                    exit();
                    }
    }

}

?>