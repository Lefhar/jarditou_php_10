<?
// On va dabors définir le fichier à envoyer et à qui
$fichier = 'save127.0.0.1_c1178_20160823-22-21.sql.gz';
$destinataire = 'staff@fullsharez.com';
$subject = 'Votre base';
// On créer un boundary unique
// On met les entêtes
$mail_to = $destinataire; //Destinataire
$from_mail = $destinataire; //Expediteur
$from_name = "Nom"; //Votre nom, ou nom du site
$reply_to = $destinataire; //Adresse de réponse
$file_name = $fichier;
$path = "/var/www/clients/client1/web1/web/phpmailer/examples/save127.0.0.1_c1178_20160823-22-21.sql.gz";

$typepiecejointe = filetype($path);
$data = chunk_split( base64_encode($path) );
//Génération du séparateur
$boundary = md5(uniqid(time()));
$entete = "From: $from_mail \n";
$entete .= "Reply-to: $from_mail \n";
$entete .= "X-Priority: 1 \n";
$entete .= "MIME-Version: 1.0 \n";
$entete .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \n";
$entete .= " \n";
$message  = "--$boundary \n";
$message .= "Content-Type: text/html; charset=\"iso-8859-1\" \n";
$message .= "Content-Transfer-Encoding:8bit \n";
$message .= "\n";
$message .= "Bonjour,<br />Veuillez trouver ci-joint le bon de commande<br/>Cordialement";
$message .= "\n";
$message .= "--$boundary \n";
$message .= "Content-Type: $typepiecejointe; name=\"$file_name\" \n";
$message .= "Content-Transfer-Encoding: base64 \n";
$message .= "Content-Disposition: attachment; filename=\"$file_name\" \n";
$message .= "\n";
$message .= $data."\n";
$message .= "\n";
$message .= "--".$boundary."--";
mail($mail_to, $subject, $message, $entete);
echo $_SERVER['DOCUMENT_ROOT'];
echo $typepiecejointe;
?>