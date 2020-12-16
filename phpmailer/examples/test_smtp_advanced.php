<html>
<head>
<title>PHPMailer - SMTP advanced test with authentication</title>
</head>
<body>

<?php

require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {

  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host = '91.234.194.145';
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->SMTPAuth = true; // Si votre serveur requiert une authentification.
$mail->Username = 'staff@fullsharez.com';
$mail->Password = '4vefg7kk7116';       // SMTP account password
  $mail->AddAddress('staff@fullsharez.com', 'John Doe');
  $mail->SetFrom('staff@fullsharez.com', 'First Last');
  $mail->AddReplyTo('staff@fullsharez.com', 'First Last');
  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML(file_get_contents('contents.html'));
  $fichier = 'http://www.fullsharez.com/sauvebase/save37.187.71.47_uploadbb_20160823-23-00.sql.gz';
  //$source = file_get_contents($fichier);
  //$mail->AddAttachment(''.$source.''); 
  $mail->AddAttachment('save127.0.0.1_c1178_20160823-22-21.sql.gz'); 
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>

</body>
</html>
