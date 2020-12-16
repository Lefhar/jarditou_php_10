<html>
<head>
<title>PHPMailer - Mail() advanced test</title>
</head>
<body>

<?php
require_once '../class.phpmailer.php';

$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

try {
  $mail->AddAddress('staff@fullsharez.com', 'John Doe');
  $mail->SetFrom('staff@fullsharez.com', 'First Last');
  $mail->AddReplyTo('staff@fullsharez.com', 'First Last');
  		//		$mail->IsSMTP();
$mail->Host = '91.234.194.145';
$mail->SMTPAuth = true; // Si votre serveur requiert une authentification.
$mail->Username = 'staff@fullsharez.com';
$mail->Password = '4vefg7kk7116';
  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML(file_get_contents('contents.html'));
  //$mail->AddAttachment('save127.0.0.1_c1178_20160823-22-21.sql.gz');      // attachment
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
