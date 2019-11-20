<?php
	session_start();

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	if(count($_POST)>0){
		if(isset($_POST['name']) && isset($_POST['email'])) {
		
			//Variables from form, do not change unless adding/removing fields
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];

			//Mail build
			$recipient = "your-email@your-domain.com";
			$title = "Contact Form: testing form";
			$message_body = "Message: testing message form test";
			$mailheader = "From: $email \r\n";
			$titles = 'From: contactform@your-domain.com' . "\r\n" .
			    "Reply-To: " . $email . "\r\n" .
			    'X-Mailer: PHP/' .phpversion();

			
				$_SESSION['flash'] = "Your message has been sent!";
				$_SESSION['mail_status'] = TRUE;
				mail($recipient, $title, $message_body, $titles) or die("Contact Mailer Error!");
	
			

			//header('Content-type: application/json');
			//echo json_encode($data);
			} else {
				$_SESSION['mail_status'] = FALSE;
				$_SESSION['flash'] = "Wrong CAPTCHA Code!";
			}
		}

	

?>

<div class="contact-form-div">
	<div class="flash-div <?php if (isset($_SESSION['mail_status'])) echo ($_SESSION['mail_status'] ? 'mail-sent-true' : 'mail-sent-false'); ?> ">
		<?php if (isset($_SESSION['flash'])) { echo $_SESSION['flash'];	unset($_SESSION['flash']); } ?>
	</div>
	<form id="contact" method="POST">
		<input name="name" type="text" placeholder="Your Name*" minlength="3" maxlength="50" required autofocus/>
		<input id="email" name="email" type="email" placeholder="Your Valid Email*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="8" maxlength="255" required />
		<input id="phone" name="phone" type="phone" placeholder="Your Valid Phone (SMS)" pattern="^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$" minlength="8" maxlength="255"  />
			</div>
		</div>
		<input type="submit" value="submit" />
	</form>
</div>
