<?php 
$conn = mysqli_connect("localhost","root","","scrp");

if(isset($_POST['register']))
{	
    $username = $_POST['Username'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
    $repassword = $_POST['Repassword'];

    $email_query = "SELECT * FROM accounts WHERE Email='$email'";
    $email_query_run = mysqli_query($conn,$email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another One.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
    else
    {
        $token = md5(rand('10000', '99999'));
        if ($password == $repassword) 
        {
		    $select = "INSERT INTO accounts(Username,Password,Token,Status,Email)VALUES('".$username."','".$password."','".$token."','Inactive','".$email."')";
		    $result = mysqli_query($conn,$select);

            if($result)
            {
                $lastId = mysqli_insert_id($conn);
                $url = 'http://'.$_SERVER['SERVER_NAME'].'/fransiscoucp/verify.php?id='.$lastId.'&token='.$token;                                // Set email format to HTML
            
                $output = '<div>Hello,<br>
                Thanks for registering with Fransisco Roleplay UCP. Please click this link to comfirm your registration <br>
                <br>'.$url.'
                <br>
                <br>
                Regards,
                <br>
                Fransisco Team</div>';

                $mail = new PHPMailer();
                $mail->isSMTP();  
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl'; 
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '465'; 
                $mail->isHTML();
                $mail->Username = EMAIL;
                $mail->Password = PASS;
                $mail->setFrom(EMAIL, 'FRANSISCO ROLEPLAY:UCP');
                $mail->Subject = 'Fransisco:UCP Registration';
                $mail->Body    = $output;
                $mail->AddAddress($email);
			    if(!$mail->send())
                {
				    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
			    }
                else
                {
				    $_SESSION['status'] = "Congratulation, Your registration has been successful. please verify your account.";
                    $_SESSION['status_code'] = "success";
                    header('Location: register.php');
			    }
            }
            else
            {
                $_SESSION['status'] = "Try Another.";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
	    }
        else
        {
		   $_SESSION['status'] = "Password dan Konfirmasi Password Tidak Cocok.";
           $_SESSION['status_code'] = "warning";
           header('Location: register.php');
        }
	 }
}
?>