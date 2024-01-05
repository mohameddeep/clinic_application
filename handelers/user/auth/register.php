<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";

if(isset($_POST["register"])){

    $name=santizeinput($_POST['name']);
    $email=santizeinput($_POST['email']);
    $phone=santizeinput($_POST['phone']);
    $password=santizeinput($_POST['password']);
    $code=md5(date("H:i:s"));


    
    $error['name']=vildatename($name);
    $error['email']=vildatemail($email);
    $error['password']=vildatepassword($password);
    $error['phone']=vildatephone($phone);
    // var_dump($error);
    // die;


    if(checkerrors($error)){


        $col=["name","email","password","phone","security_code"];
        $values=[$name,$email,md5($password),$phone,$code];

        InsertData("user", $col,  $values, $con);



        $_SESSION['user_admin']="user added successfully";

        require_once "../../../phpmailer/mail.php";
            $mail->addAddress($email);//
            $mail->Subject="veriification code";
            $mail->Body="thank you to use our website" . "<div> url to sure your account </div>" .
            "<a href='http://localhost/clinic/view/user/active.php?code='.$code. > " .
            "http://localhost/clinic/view/user/active.php?code=".$code."</a>";
            $mail->setFrom('mohameddepooo@gmail.com',"mohamed depo");
            $mail->send();


        header("location:../../../view/user/login.php");
    }else{
        $_SESSION['error']=$error;

        header("location:../../../view/user/register.php");
    }



}else{

    header("location:../../../view/user/register.php");
}

