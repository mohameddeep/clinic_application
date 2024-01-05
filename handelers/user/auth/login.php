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
        $user=getonerow("user",$con,["*"],["email" =>$email,"password" =>md5($password)]);

       

           
                if($user['actived'] == true){
                    $_SESSION["user_login"]=$user;
                header("location:../../../view/user");

                }else{
                    $_SESSION["unverfied_user"]="you must verfied your account";
                    $_SESSION["wrong_info"]="invalid info";
                    header("location:../../../view/user/login.php");
                }
                

           
        }




    }else{
        $_SESSION['error']=$error;

        header("location:../../../view/user/login.php");
    }

    

