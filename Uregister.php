<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"tour");
?>



<?php
require_once("./mailer/class.phpmailer.php");
require_once("./mailer/class.smtp.php");

function sendemail_verify($name, $email, $verify_token){
	$mail = new PHPMailer();

	//$mail->SMTPDebug = 2;
	$mail->isSMTP();                                                    //Send using SMTP
	$mail->SMTPAuth   = true;                                           //Enable SMTP authentication

	$mail->Host       = 'smtp.gmail.com';                               //Set the SMTP server to send through
	$mail->Username   = 'sukarnaghosh01@gmail.com';                         //SMTP username
	$mail->Password   = 'hupnfytlixlqstad';                             //SMTP password

	$mail->SMTPSecure = 'tls';                                              //Enable implicit TLS encryption
	$mail->Port       = 587;                                            //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

	$mail->setFrom('sukarnaghosh01@gmail.com', $name);
	$mail->addAddress($email);                                          //Name is optional

	$mail->isHTML(true);
    $mail->Subject = 'Verification mail from Bijoy Travels';
    // $mail->SMTPOptions = array(
    //     'ssl' => array(
    //     'verify_peer' => false,
    //     'verify_peer_name' => false,
    //     'allow_self_signed' => true
    //     )
    //     );
    $email_template = "
        <h2>You have Registered with Bijoy Travels</h2>
        <h5>Verify your email to Login with the link below</h5>
        <br>
        <a href = 'http://localhost/tour2/web_project/verify_email.php?token=$verify_token'> Click me </a>
    ";
    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent'
}


if(isset($_POST['register_btn'])){
    $name = $_POST['name'];
    $phone = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$address= $_POST['address'];
    $verify_token = md5(rand());
    
    // Email exists or not
    $check_email_query = "SELECT email FROM guest WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($connection, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
        $_SESSION['status'] = "Email already exists";
        echo "<script> window.location.href='Usignup.php'; </script>";
    }
    else{
        // Insert User Data
        $query = "INSERT INTO guest(name, mobile, email, password,address,verify_token) VALUES ('$name', '$phone', '$email', '$password','$address','$verify_token' )";
        $query_run = mysqli_query($connection, $query);
		if($query_run){
            sendemail_verify("$name", "$email", "$verify_token");
            $_SESSION['status'] = "Registration Successful! Please Verify your Email.";
            echo "<script> window.location.href='Usignup.php'; </script>";
        }
        else{
            $_SESSION['status'] = "Registration Failed";
            echo "<script> window.location.href='Usignup.php'; </script>";
        }
    }
}
?>
<!-- <script type="text/javascript">
	alert("Registration successfully....You may login now.")
	window.location.href = "Ulogin.php";
</script> -->