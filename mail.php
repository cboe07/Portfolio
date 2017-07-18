<!-- FIrst, make sure you: -->
<!-- 1. sudo apt-get install libphp-phpmailer -->
<!-- 2. sudo apt-get install sendmail-bin -->

<?php

      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      $_POST['name'] = "Chris";
      $_POST['email'] = "cboe07@gmail.com";
      $body = "Hi, from Chris!";
      $mySiteAddress = 'chris@chrisboeckel.com';
      $siteName = 'chrisboeckel.com';

      require_once('/usr/share/php/libphp-phpmailer/class.phpmailer.php');
      $mail = new PHPMailer(); // defaults to using php "mail()"
      $body = $_POST['message'];
      $mail->AddReplyTo($_POST['email'],$_POST['name']);
      $mail->SetFrom($mySiteAddress);
      $mail->AddAddress("cboe07@gmail.com", "Chris Boeckel");
      $mail->Subject    = "Message from ".$siteName;
      $mail->MsgHTML("Message From: " . $_POST['name'] . "  | Email: " . $_POST['email'] . " | "  . $body);

      if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
      echo "Message sent!";
      }
      exit;
      header('location: /#contact');

?>