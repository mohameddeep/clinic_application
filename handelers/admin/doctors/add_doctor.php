<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";

if(isset($_POST["add_doctor"])){

    $name=santizeinput($_POST['name']);
    $city=santizeinput($_POST['city']);
    $governate=santizeinput($_POST['governate']);
    $phone=santizeinput($_POST['phone']);
    $descr=santizeinput($_POST['descr']);
    $major=$_POST['major_id'];

    $image=$_FILES['image'];

    
    $imagename=$image['name'];
    $imagetype=$image['type'];
    $image_tmp=$image['tmp_name'];
    $imagesize=$image['size'];


    
    $error['name']=vildatename($name);
    $error['city']=vildatecity($city);
    $error['governate']=vildatecity($governate);
    $error['phone']=vildatephone($phone);
    $error['image']=validateimage($image);


    if(checkerrors($error)){

        $imageextention=pathinfo($imagename)['extension'];
        $newimg=uniqid() . "." .$imageextention;
        move_uploaded_file($image_tmp,"../../../public/file/$newimg");

        $col=["name","city","governate","phone","descr","image","major_id"];
        $values=[$name,$city,$governate,$phone,$descr,$newimg,$major];

        InsertData("doctors",  $col,  $values, $con);

        $_SESSION['add_doctor']="doctor added successfully";

        header("location:../../../view/admin/doctors/add_doctor.php");
    }



}
