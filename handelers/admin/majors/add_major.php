<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";

if(isset($_POST["add_major"])){

    $name=santizeinput($_POST['major_name']);

    $image=$_FILES['image'];

    
    $imagename=$image['name'];
    $imagetype=$image['type'];
    $image_tmp=$image['tmp_name'];
    $imagesize=$image['size'];


    
    $error['name']=vildatename($name);
    $error['image']=validateimage($image);


    if(checkerrors($error)){

        $imageextention=pathinfo($imagename)['extension'];
        $major_image=uniqid() . "." .$imageextention;
        move_uploaded_file($image_tmp,"../../../public/file/$major_image");

        $col=["name","image"];
        $values=[$name,$major_image];

        InsertData("major",  $col,  $values, $con);

        $_SESSION['add_major']="major added successfully";

        header("location:../../../view/admin/majors/add_major.php");
    }else{

        header("location:../../../view/admin/majors/add_major.php");
    }



}
