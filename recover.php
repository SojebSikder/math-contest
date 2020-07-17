<?php 
include_once "inc/header.php"; 

include_once "classes/Email.php"; 

    $db = new Database();
    $format = new Format();

    if(isset($_POST['submit'])){

        if(isset($_POST['email'])){

            $email = $format->Stext($_POST['email']);
            $code = uniqid(true);

            $queryPass="insert into ucode(code, email) values('$code', '$email')";
            $dataRecover = $db->insert($queryPass);

            $url="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"])."/reset.php?code=$code";

            $message="<html>";
            $message.="<body>";

            $message.="<h1>You requested a password reset</h1>";
            $message.="<a href='$url'>Click this</a> link to reset password";

            $message.="</body>";
            $message.="</html>";
            
            sendEmail($email,"Your password reset link", $message);

        }else{
            echo "First Enter your Email :(";
        }

        
    }

    /*
    if(isset($_POST['submit'])){

        $email=$format->Stext($_POST['email']);
        $code=uniqid(true);

        $queryPass="insert into ucode(code,email) values('$code','$email')";
        $dataRecover = $db->insert($queryPass);

      //  if(!$dataRecover){
          //  header("Location: recover.php?msg=".urlencode('Something went wrong.'));
      //  }
       // else{
            $url="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"])."/reset.php?code=$code";

            $to =$email;
            $subject="Your password reset link";

            $message="<html>";
            $message.="<body>";

            $message.="<h1>You requested a password reset</h1>";
            $message.="<a href='$url'>Click this</a> link to reset password";

            $message.="</body>";
            $message.="</html>";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: noreply-sojebsoft@gmail.com' . "\r\n";



            if(isset($_POST['email'])){

                ini_set("SMTP","ssl://smtp.gmail.com");
                ini_set("smtp_port","465");

                ini_set("auth_username","sojebsikder7");
                ini_set("auth_password ","sojeb123");

                ini_set('sendmail_from', 'sojebsikder7@gmail.com');



                if (mail($to, $subject, $message,$headers)) {
                   // echo "reset password link has been sent";
                   header("Location: recover.php?msg=".urlencode('Code has been Successfully. Check you email'));
                
                }else{
                    echo "Can not sent reset password mail. something error";
                }
            }
       // }



    }
    */

    ?>


    <form class="form-signin" action="" method="POST">
      
      <h1 class="h3 mb-3 font-weight-normal text-white">Password Recovery</h1>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>


      <p class="float-right text-white">Back to login? <a href="login.php">Login</a></p>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Reset Password</button>
    </form>



<?php include "inc/footer.php"; ?>