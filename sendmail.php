
<?php
	
	header('content-type: application/json; charset=utf=8');

	if (isset($_POST['name'])) {
		$name	=	strip_tags($_POST['name']);
		$email	=	strip_tags($_POST['email']);
		$msg	=	strip_tags($_POST['message']);
		$header =	"From: ". $name . "<" . $email . ">rn";

		$ip 		=	$_SERVER['REMOTE_ADDR'];
		$httpref 	= 	$_SERVER['HTTP_REFERER'];
		$httpagent 	=	$_SERVER['HTTP_USER_AGENT'];
		$today		=	date("F j, Y, g:i a");

		$recipient	=	'tony.brown.357@gmail.com';
		$subject	=	'Contact Form';
		$mailbody	=	"
	First Name: $name
	Email: $email,
	Message: $msg,

	IP: $ip,
	Browser info: $httpagent,
	Referral: $httpref,
	Sent: $today";
		$result = 'success';

		if (mail($recipient, $subject, $mailbody, $header)) {
			echo json_encode($result);

			echo "<h3>Thank you!</h3>";
		}
	}
 ?>
