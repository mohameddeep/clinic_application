<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";

if(isset($_POST['login'])){


    $email=santizeinput($_POST['email']);
    $password=santizeinput($_POST['password']);


    $error['email']=vildatemail($email);
    $error['password']=vildatepassword($password);

    if(checkerrors($error)){
        $admin=getonerow("admin",$con,["*"],["email" =>$email,"password" =>md5($password)]);

       

            if($admin){
                $_SESSION["admin_login"]=$admin;
                header("location:../../../view/admin/home");

            }else{
                $_SESSION["error_info"]="invalid crednits";
                header("location:../../../view/admin/auth/login.php");

            }
       




    }else{
        $_SESSION['error']=$error;

        header("location:../../../view/admin/auth/login.php");
    }

    

}