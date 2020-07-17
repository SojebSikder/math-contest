<?php
//include_once "../helpers/Format.php";

use PHPMailer\PHPMAiler\PHPMailer;
use PHPMailer\PHPMAiler\SMTP;
use PHPMailer\PHPMAiler\Exception;

require "./lib/PHPMailer/src/Exception.php";
require "./lib/PHPMailer/src/PHPMailer.php";
require "./lib/PHPMailer/src/SMTP.php";


function sendEmail($address, $subject, $body){

    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "sojebsikder7@gmail.com";
        $mail->Password = "sojebsikder123";
        $mail->SMTPSecure = PHPMAiler::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom("mathcontest@gmail.com","Math Contest");
        $mail->addAddress($address);


        //Attachment
        //$mail->addAttachment("");

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        echo "Message has been sent";


    } catch (Exception $e) {
        //throw $e;
    }

}

//sendEmail();




/*
class Email{

    private $format;

    public function __construct(){
        $this->format= new Format();
    }

    public function sentEmail($to,$subject,$message,$headers){

        ini_set("SMTP","ssl://smtp.gmail.com");
        ini_set("smtp_port","465");
        ini_set("sendmail_from","sojebsoft@gmail.com");

        if (mail($to, $subject, $message,$headers)){
            return true;
        }else{
            return false;
        }
    }


}

$email = new Email();
$test = $email->sentEmail("sojebsikder@gmail.com","ssdd","ff","sikdersojeb@gmail.com");
if($test){
    echo "done...";
}else{
    echo "Something went wrong";
}
*/


 ?>