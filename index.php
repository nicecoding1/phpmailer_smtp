<html>
<head>
<title>PHPMailer - SMTP advanced test with authentication</title>
</head>
<body>

<?php
include('class.phpmailer.php');

$mail = new PHPMailer(true);
$mail->IsSMTP();

try {
  $mail->Host       = "domain.com";
  $mail->SMTPDebug  = 2;//0~5, 0:no debug
  $mail->SMTPAuth   = true;
  $mail->Port       = 587;//cafe24 Port 587
  $mail->Username   = "test@domain.com";
  $mail->Password   = "password";
  $mail->AddAddress('test@domain.com', 'test');
  $mail->SetFrom('test@domain.com', 'test');
  $mail->AddReplyTo('test@domain.com', 'test');
  $mail->Subject = 'PHPMailer Test Subject';
  $mail->MsgHTML('Body message !');
  //$mail->MsgHTML(file_get_contents('contents.html'));
  $mail->AddAttachment('ryan.jpg');

  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage();
} catch (Exception $e) {
  echo $e->getMessage();
}
?>

</body>
</html>
