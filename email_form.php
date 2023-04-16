<?php

#Receive user input
$name_input = $_POST['name_input'];
$email_input = $_POST['email_input'];
$message_input = $_POST['message_input'];

#Filter user input
function filter_email_header($form_field) {  
return preg_replace('/[nr|!/<>^$%*&]+/','',$form_field);
}

$email_input  = filter_email_header($email_input);

#Send email
$headers = "From: $email_input";
$sent = mail('chadwkirk@gmail.com', 'Saw Your Portfolio!', $message_input, $headers);

#Thank user or notify them of a problem
if ($sent) {

?><html>
<head>
<title>Thank You</title>
</head>
<body>
<h1>Thank You</h1>
<p>Thank you for your feedback.</p>
</body>
</html>
<?php

} else {

?><html>
<head>
<title>Something went wrong</title>
</head>
<body>
<h1>Something went wrong</h1>
<p>We could not send your feedback. Please try again.</p>
</body>
</html>
<?php
}
?>