<?php

session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";

if(isset($_POST['checkemail'])){


    $email=$_POST['email'];

    $checkemail=getonerow("user",$con,["email","security_code"],["email" => $email]);
    $code=$checkemail["security_code"];
if($checkemail){
    require_once "../../../phpmailer/mail.php";
    $mail->addAddress($email);
    $mail->Subject="reset password link";
    $mail->Body="visit this link to reset password"  .
    "<a href='http://localhost/clinic/view/user/restpassword.php?email=$email&code='.$code. > " .
    "http://localhost/clinic/view/user/restpassword.php?email=$email&code=".$code."</a>";
    echo $mail->Body;
    $mail->setFrom('mohameddepooo@gmail.com',"mohamed depo");
    $mail->send();
    $sendmail=$_SESSION["send_email"]="link is sent to your mail to reset password";
    header("location:../../../view/user/restpassword.php");

}else{
    $wronemail=$_SESSION["wrong_email"]="your email is wrong";
    header("location:../../../view/user/restpassword.php");
}



}