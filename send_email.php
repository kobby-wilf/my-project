<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Load Composer's autoloader
// require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'dobeylogistics.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@dobeylogistics.com';                     // SMTP username
    $mail->Password   = 'Momylove123@';                               // SMTP password
    $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;      //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       =  587;              		// 465;     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@dobeylogistics.com', 'Dobey Logistics');
    $mail->addAddress('richanderson592@gmail.com', 'Joe User');     // Add a recipient
    $mail->addReplyTo('info@dobeylogistics.com', 'Information');
   // $mail->addCC('mawuli098@gmail.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "[Dobey Logistics] Package Shipped";
    $mail->Body    = '
						<div style="text-align:center;" class="container"> 
                        <h2 style="background-color:blue;padding:5px;width:40%;color:#fff;right:0;left:0;">Dobey Logistics</h2>
                        <hr style="width="30%;"/>
                        <h1 style="margin-top:20px;">Hi Christine <br>Rasmussen, </h1>
                        <p style="margin-top:15px;">Your package has been shipped. Please check the form for details:</p><br>
						
 <a href="dobeylogistics.com/tracking.html" style="background-color:lightblue;color:#fff;padding:5px;text-decoration:none;">Track your package ></a>          
												
                        </div>
						
						<div class="container" style="margin-top:50px;">
                        <bTracking number:    GYUMP83886600J0G </b><br>
						
                        <b>Estimated shipping time:   Sep 22 2022 - Oct 2 2022</b><br>

						
                        <b>Delivery company:</b>
                        <p>Dobey Logistics</p><br>

                        <b>Shipping address: </b><br>					
               		   29845 County Road 353<br>
                  	   Buena Vista, CO 81211<br>
                       United States<br>					
                       (913) 522-7957<br>
					   
					   <b>Reciever:</b> Richard Anderson<br>
					   <b>Alternative Reciever:</b> Christine L. Rasmussen<br>
					   </div>
					
                        <img src="shipimgs/logo12.PNG"> <br>
						<div class="container" style="text-align:center;">
                        This is an automatically generated email, please do not reply.<br>
                        If you have any queries regarding your account, please contact us.
                        </div>
					 ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}