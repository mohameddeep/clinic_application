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

    deleteData("appoinment",$con,$filter);
    $_SESSION['delete_appoinment']="appoinment deleted successfully";
    header("location:../../../view/admin/appoinments/all_appoinments.php");


}else{
    header("location:../../../view/admin/appoinments/all_appoinments.php");
}