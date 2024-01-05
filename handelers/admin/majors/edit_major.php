<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";


if(isset($_POST['edit_major'])){
    
    $major_id=$_POST['major_id'];
    $name=santizeinput($_POST['major_name']);

    $image=$_FILES['image'];

    
    $imagename=$image['name'];
    $imagetype=$image['type'];
    $image_tmp=$image['tmp_name'];
    $imagesize=$image['size'];


    
    $error['major_name']=vildatename($name);
    $error['image']=validateimage($image);

    if(checkerrors($error)){
        $imageextention=pathinfo($imagename)['extension'];
        $major_image=uniqid() . "." .$imageextention;
        move_uploaded_file($image_tmp,"../../../public/file/$major_image");

        $col=[
            "name" => $name,
            "image" => $major_image,
        ];
        $filter=[
            "id" => $major_id

        ];
        updateData("major", $col, $con, $filter);
        $_SESSION['edit_major']="major edit successfully";
        header("location:../../../view/admin/majors/all_majors.php");

        




    }else{
        $_SESSION['error']=$error;

        header("location:../../../view/admin/majors/edit_major.php?id=$major_id");
       
    }


}else{
    header("location:../../../view/admin/majors/all_majors.php");
}