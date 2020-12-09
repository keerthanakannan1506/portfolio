<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 include 'dbconfig.php';
 
 require 'vendor/autoload.php';
   $name = $_REQUEST['name'];
   $email = $_REQUEST['email'];
   $subject= $_REQUEST['subject'];
   $message = $_REQUEST['message'];
   $email_body = 'Amazing Photography';

   if ($email!='') {
  
    $insertquer = $pdoconn->prepare("INSERT INTO contact_detail (name,email,subject,message)VALUES ('$name','$email','$subject','$message')");      

    if($insertquer->execute()) {
        
            $output = "";
            $output .="<table align='center' border='1'>";
            $output .="<tr><th>Name</th><td align='center'>$name</td></tr>";
            $output .="<tr><th>Email</th><td align='center'>$email</td></tr>";
            $output .="<tr><th>subject</th><td align='center'>$subject</td></tr>";
            $output .="<tr><th>Message</th><td align='center'>$message</td></tr>";
            $output .="</table>";
        
                $message = "Hi,"."<br /><br />".$output."<br /><br />"."<h3><i>Have a great day!</i></h3>";

                $mail = new PHPMailer(true);
        
            try {
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true; 
            $mail->Username = "keerthna.kannan@gmail.com";                                  
            $mail->Password   = "zycdnmwlwurscevh";                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;                                  
            $mail->setFrom('keerthna.kannan@gmail.com', 'Portfolio');
            $mail->addAddress('keerthna.kannan@gmail.com', 'Portfolio');    
            $mail->isHTML(true);                                
            $mail->Subject = $email_body;
            $mail->Body    = $message;
            $mail->send();
        
            echo "<script type='text/javascript'>alert('Message has been sent'); window.location='index.php';</script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            $email_body1 = "Thank You For Visiting US";                        
            $message1 = "Hello"."\t".","."<br /><br />". "<b>Thank you for getting in touch!</b>"."<br /><br />"."We appreciate you contacting us. One of our colleagues will get back in touch with you soon!"."<br /><br />"."Have a great day!"."<br /><br />"."Regards".","."<br />"."
                    Amazing Digital Pictures Team...";
            $mail = new PHPMailer(true);


            try {
                            
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                    
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'keerthna.kannan@gmail.com';                     // SMTP username
                    $mail->Password   = 'zycdnmwlwurscevh';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 587; 
                    //Recipients
                    $mail->setFrom('keerthna.kannan@gmail.com', 'Amazing Digital Pictures');
                    $mail->addAddress($email);     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    
                    $mail->Subject = $email_body1;
                    $mail->Body    = $message1;
                    $mail->send();

                    echo "<script type='text/javascript'>alert('Message has been sent');window.location='index.php';</script>";
                    
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }



    }


}


 
  
?>
