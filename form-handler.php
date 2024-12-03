<?php
$name = $_POST['Name'];
$visitor_email = $_POST['email'];
$Beetype = $_POST['Bee type'];
$Message = $_POST['Message'];

$email_from = 'info@beeline.com'

$email_subject = 'New Form Submission'

$email_body = "User name: $name.\n". 
              "User email: $headers.\n"
               "Bee type: $Beetype.\n"
               "User Message: $Message.\n";

$to = 'eyoekemini248@gmail.com'

$headers = "from: $email_from \r\n";

$headers = "Reply_to: $headers \r\n";

mail($to,$email_Beetype,$email_body,$headers);

header("Location: contact.html");

?>