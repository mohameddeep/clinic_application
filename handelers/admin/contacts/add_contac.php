<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";

if(isset($_POST["send"])){

    $name=santizeinput($_POST['name']);
    $email=santizeinput($_POST['email']);
    $phone=santizeinput($_POST['phone']);
    $subject=santizeinput($_POST['subject']);
    $message=santizeinput($_POST['message']);
    $user_id=$_SESSION["user_login"]['id'];



    
    $error['name']=vildatename($name);
    $error['email']=vildatemail($email);
    $error['subject']=vildatename($subject);
    $error['message']=vildatename($message);
    $error['phone']=vildatephone($phone);
  


    if(checkerrors($error)){

        

        $col=["name","email","phone","subject","message","user_id"];
        $values=[$name,$email,$phone,$subject,$message,$user_id];

        InsertData("contacts",  $col,  $values, $con);

        $_SESSION['add_contacts']="your message is added";

        header("location:../../../view/user/contact.php");
    }



}
