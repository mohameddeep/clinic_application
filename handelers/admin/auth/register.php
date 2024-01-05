<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";

if(isset($_POST["register"])){

    $name=santizeinput($_POST['name']);
    $email=santizeinput($_POST['email']);
    $password=md5(santizeinput($_POST['password']));

    $image=$_FILES['image'];

    
    $imagename=$image['name'];
    $imagetype=$image['type'];
    $image_tmp=$image['tmp_name'];
    $imagesize=$image['size'];


    
    $error['name']=vildatename($name);
    $error['email']=vildatemail($email);
    $error['password']=vildatepassword($password);
    $error['image']=validateimage($image);


    if(checkerrors($error)){

        $imageextention=pathinfo($imagename)['extension'];
        $admin_image=uniqid() . "." .$imageextention;
        move_uploaded_file($image_tmp,"../../../public/file/$admin_image");

        $col=["name","email","password","image"];
        $values=[$name,$email,$password,$admin_image];

        InsertData("admin", $col,  $values, $con);

        $_SESSION['add_admin']="admin added successfully";

        header("location:../../../view/admin/auth/login.php");
    }else{
        $_SESSION['error']=$error;

        header("location:../../../view/admin/auth/register.php");
    }



}
