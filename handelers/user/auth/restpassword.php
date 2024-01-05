<?php   
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";




  

if(isset($_POST['newpassword'])){
   

   
        $email=$_POST['email'];
        $newpassword=$_POST['password'];
        $error['password']=vildatepassword($newpassword);
        

        if(checkerrors($error)){

            $resetpassword=updateData("user",["password" => md5($newpassword)],$con,["email" => $email]);
            if($resetpassword){
                $_SESSION['resetpassword']="password updated successfully";
                header("location:../../../view/user/login.php");

            }
    
        }else{
            $_SESSION['error']=$error;
            header("location:../../../view/user/restpassword.php");
        }
        }else{
            header("location:../../../view/user/restpassword.php");
        }
       
       












