<?php
         $to = "himangshumjh@gmail.com";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:himangshu.zomnor@gmail.com \r\n";
         $header .= "Cc:himangshu.zomnor@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>






<?php
    // $mailbody="This is test";
    

    // $email_id = "himangshu.zomnor@gmail.com";
    // $cheaders = "From: <".$email_id.">\n";
    // $cheaders .= "MIME-Version: 1.0\n";
    // $cheaders .= "Content-type: text/html; charset=iso-8859-1";
    // $recipient = "himangshumjh@gmail.com";
    // $subject="Requirement Form";
    // mail($recipient, $subject, $mailbody , $cheaders);

?>