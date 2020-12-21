<?php
 if(file_exists("db.php")){include("db.php");}
 if(file_exists("connect.php")){include("connect.php");}
 if(file_exists("phpmailer/class.phpmailer.php")){include("phpmailer/class.phpmailer.php");}
 
if(!empty($row['u_mail'])){
    header("Location:index.php");
    exit();
  }
  if(!empty($_GET['email'])&&preg_match("`^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$`",$_GET['email']))
{
                $query = $db->prepare("SELECT u_nom, u_prenom, u_mail_hash, u_mail FROM users WHERE u_mail = :u_mail");
                $query->bindParam(":u_mail", $_GET['email']);
                $query->closeCursor();//on libére la mémoire
                $query->execute();
                $row = $query->fetch(PDO::FETCH_ASSOC);
                $query->closeCursor();//on libére la mémoire
                if(!empty($row['u_mail'])){
                    $validation = $row['u_mail_hash'];

                            $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
                                // code pour recupérer le chemin quelque soit l'endroit ou je met jarditou
                            $chemin = $protocol."://".$_SERVER['HTTP_HOST']."".$_SERVER['SCRIPT_NAME'];
                            $chemin = str_replace(basename($chemin), "", $chemin);


                            // Message en html
                            $message = "<!DOCTYPE html>
                            <html lang='fr'>
                            <head>
                            <meta charset='utf-8'>
                            <title>Confirmer votre adresse email</title>   
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
                            <link rel='stylesheet' href='".$chemin."assets/css/style.css'>
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
                                        <p><a href='".$chemin."confirm_mail.php?validation=".urlencode($validation)."' > Confirmez votre adresse email</a></p>
                                        si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien ".$chemin."confirm_mail.php?validation=".urlencode($validation)."
                                    </div>    
                                </div>   
                                <div class='row'>
                                    <div class='col-12'>
                                        <img src='".$chemin."src/img/jarditou_logo.jpg' title='Logo' alt='Logo' class='img-fluid'>
                                    </div>    
                                </div>   
                            </div> 
                                
                            <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
                            <script src='".$chemin."assets/js/script.js'></script>
                            <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
                            <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
                            </body>
                            </html>";

                            $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

                            $mail->IsSMTP(); // telling the class to use SMTP
                            
                            try {



                            $mail->SMTPAuth   = true;                  // enable SMTP authentication
                            $mail->Host = 'smtp.laposte.net';
                            $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
                            $mail->SMTPAuth = true; // Si votre serveur requiert une authentification.
                            $mail->Username = 'igor.popoviche@laposte.net';
                            $mail->Password = '4vefg7kK';//
                            $mail->AddAddress($row['u_mail'], ''.$row['u_prenom'].' '.$row['u_nom'].'');
                            $mail->SetFrom('igor.popoviche@laposte.net', 'Service commercial');
                            $mail->AddReplyTo('igor.popoviche@laposte.net', 'Service commercial');
                            $mail->Subject = 'Confirmation de votre email';
                            $mail->AltBody = "si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien ".$chemin."confirm_mail.php?validation=".urlencode($validation).""; // optional - MsgHTML will create an alternate automatically
                            $mail->MsgHTML($message);

                                    if($mail->Send())
                                    {
                                    
                                        header("Location: login.php?e=9");  

                                    }
                                    else
                                    {

                                        header("Location: login.php?e=10");// si ya une erreur on renvoi avec le get e numéro 5

                                    }

                            } catch (phpmailerException $e) {
                            echo $e->errorMessage(); //Pretty error messages from PHPMailer
                            } catch (Exception $e) {
                            echo $e->getMessage(); //Boring error messages from anything else!
                            }
                            $mail->SmtpClose();

                        }else{
                            header("Location: login.php?e=9");  
                            exit();
                        }


}else{
   header("Location: login.php?e=9");  
     exit();
}