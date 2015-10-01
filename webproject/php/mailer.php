<?php
/* Set e-mail recipient */
$myemail = "g00183087@outlook.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Your Name");
$email = check_input($_POST['email'], "Email Address");
$subject = check_input($_POST['subject'], "Message Subject");
$message = check_input($_POST['message'], "Enter your message here");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("Invalid e-mail address");
}
/* Let's prepare the message for the e-mail */

$subject = "You have a new message ";

$message = "

Someone has sent you a message using your contact form:

Name: $name
Email: $email
Subject: $subject

Message:
$message

";

mail($myemail, $subject, $message, $headers);

/* Redirect visitor to the thank you page */
header('Location: http://accellorize.net46.net/Thank-You.html');
exit();

function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
exit();
}
?>