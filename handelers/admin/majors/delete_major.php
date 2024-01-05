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

    deleteData("major",$con,$filter);
    $_SESSION['delete_major']="major deleted successfully";
    header("location:../../../view/admin/majors/all_majors.php");


}else{
    header("location:../../../view/admin/majors/all_majors.php");
}