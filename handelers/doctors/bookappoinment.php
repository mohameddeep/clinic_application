<?php

session_start();
require "../../core/db.php";
require "../../core/function.php";
require "../../core/validation.php";

if(isset($_POST['booking'])){


    $doctor_id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $doctor_name=$_POST['doctor_name'];
    $speciality=$_POST['speciality'];
    $user_id=$_SESSION['user_login']['id'];

    $error['name']=vildatename($name);
    $error['email']=vildatename($email);
    $error['phone']=vildatename($phone);


    if(checkerrors($error)){

        $cols=["name" ,"email" ,"phone" ,"user_id","doctor_name","speciality"];
        $data=[$name,$email,$phone,$user_id,$doctor_name,$speciality];

        $addappoinment=InsertData("appoinment" ,$cols, $data , $con);

        if($addappoinment){
            $_SESSION['add_appoinment']="your appoinment is added succesfully";
            header("location:../../view/doctor/appoinment.php?id=".$doctor_id);

        }


    }else{
        $_SESSION['error']=$error;
        header("location:../../view/doctor/appoinment.php?id=");
    }

}