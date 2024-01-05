<?php 
session_start();
require "../../../core/db.php";
require "../../../core/function.php";
require "../../../core/validation.php";


if(isset($_GET['id'])){

    $d_id=$_GET['id'];

    $filter=[
        "id" =>$d_id,
    ];

    deleteData("doctors",$con,$filter);
    $_SESSION['delete_doctor']="doctor deleted successfully";
    header("location:../../../view/admin/doctors/all_doctors.php");


}else{
    header("location:../../../view/admin/doctors/all_doctors.php");
}