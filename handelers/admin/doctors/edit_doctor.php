<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";



if(isset($_POST['edit_doctor'])){
    
    $doctor_id=$_POST['id'];
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

        $col=[
            "name" => $name,
            "city" => $city,
            "governate" =>$governate,
            "phone" =>$phone,
            "descr" => $descr,
            "image" => $newimg,
            "major_id"=> $major
        ];
        $filter=[
            "id" => $doctor_id

        ];
        updateData("doctors", $col, $con, $filter);
        $_SESSION['edit_doctor']="doctor edit successfully";
        header("location:../../../view/admin/doctors/all_doctors.php");

        




    }else{
        $_SESSION['error']=$error;

        header("location:../../../view/admin/doctors/edit_doctor.php?id=$doctor_id");
       
    }


}else{
    header("location:../../../view/admin/doctors/all_doctors.php");
}