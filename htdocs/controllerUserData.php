<?php

session_start();

include('db.php');



// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// These must be at the top of your script, not inside a function
require  "mail/Exception.php";
require  "mail/PHPMailer.php";
require  "mail/SMTP.php";



// Load Composer's autoloader

//require 'vendor/autoload.php';



// Instantiation and passing `true` enables exceptions

$mail = new PHPMailer(true);



$msg ='';

$errors= array();



//Registration and Email OTP

if(isset($_POST['register'])){

	$name = mysqli_real_escape_string($con, $_POST['name']);

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $password = mysqli_real_escape_string($con, $_POST['password']);

	

	$email_check = "SELECT * FROM user WHERE email = '$email'";

    $res = mysqli_query($con, $email_check);

    if(mysqli_num_rows($res) > 0){

        $errors['email'] = "Email that you have entered is already exist!";

    }

    if(count($errors) === 0){

		$encpass = password_hash($password, PASSWORD_BCRYPT);

		$verification_id=rand(999999, 111111);

		$verification_status = "0";

		$insert_data = "INSERT INTO user(name,email,password,verification_status,verification_id) values('$name','$email','$password',$verification_status,'$verification_id')";

		

		$data_check =mysqli_query($con, $insert_data);

		

		

		if($data_check) {

			$msg="We've just sent a verification OTP to <strong>$email</strong>.";

			$mailHtml="Please confirm your account registration with the OTP given below: $verification_id</a>";

    		//Server settings

			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			
			$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages

    		$mail->isSMTP();                                            // Send using SMTP

			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through

			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication

			$mail->Username   = 'rudraaugadhtech@gmail.com';                     // SMTP username

			$mail->Password   = 'Rudra@130012';                               // SMTP password

			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            $mail->SMTPSecure = 'tls';                                  // ssl is deprecated


			//Recipients

			$mail->setFrom('rudraaugadhtech@gmail.com','ExamMania RudraTech');

			$mail->addAddress($email);     // Add a recipient





			// Content

			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Verification for ExamMania';

			$mail->Body    = $mailHtml;

            $mail->AltBody = 'HTML messaging not supported';        // If html emails is not supported by the receiver, show this body
                                                                    // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

			$mail->send();

			


			echo 'Message has been sent';

			header ('Location: user-otp.php');

			exit();

		}else{

                $errors['otp-error'] = "Failed while sending code!";

            }

        }else{

            $errors['db-error'] = "Failed while inserting data into database!";

        }

}

//if user click verification code submit button

  if(isset($_POST['check'])){

	  $_SESSION['info'] = "";

	  $otp_code = mysqli_real_escape_string($con, $_POST['otp']);

	  $email = mysqli_real_escape_string($con, $_POST['email']);

      //$check_code = "SELECT * FROM user WHERE where verification_id = $otp_code and email='$email'";

      $code_res = mysqli_query($con, "select * from user where verification_id='$otp_code' and email='$email'")or die("Error");

	  

	  if(mysqli_num_rows($code_res) > 0){

            $fetch_data = mysqli_fetch_assoc($code_res);

            $fetch_code = $fetch_data['verification_id'];

            $email = $fetch_data['email'];

            $verification_id = 0;

            $verification_status = 1;

            $update_otp = "UPDATE user SET verification_id = $verification_id, verification_status = '$verification_status' WHERE verification_id = $fetch_code";

            $update_res = mysqli_query($con, $update_otp);

            if($update_res){

				$msg="Verified Thank You Continue to login";

				$_SESSION['name'] = $name;

                $_SESSION['email'] = $email;

                header('location: index.php');

                

                	

            }else{

                $errors['otp-error'] = "Failed while updating code!";

            }

	  }else{

            $errors['otp-error'] = "You've entered incorrect code or Already Verified! Login.";

   		}

  }



    //if user click login button

    if(isset($_POST['login'])){

        $email = mysqli_real_escape_string($con, $_POST['email']);

        $password = mysqli_real_escape_string($con, $_POST['password']);
		$wlcome = array();

         

        $check_email = mysqli_query($con, "select * from user where email = '$email' and password='$password'");

        if(mysqli_num_rows($check_email) > 0){

            $fetch = mysqli_fetch_assoc($check_email);

			$_SESSION['email'] = $email;

            $_SESSION['password'] = $password;

            $verification_status = $fetch['verification_status'];

            if($verification_status == 1){
				
				$username = $fetch['name'];
				
				session_start();
				$_SESSION['sid']=session_id();
				$_SESSION['username'] = $username;
                
                header('location: dashboard.php');

				$msg="Success";

                }

			else{

            $info = "It's look like you haven't still verify your email - $email";

            $_SESSION['info'] = $info;

            header('location: user-otp.php');

             }

            

        }else{

            $errors['email'] = "It's look like you're not yet a member! First Register.";

        }

    }



?>