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

    deleteData("contacts",$con,$filter);
    $_SESSION['delete_contact']="contact deleted successfully";
    header("location:../../../view/admin/contacts/all_contact.php");


}else{
    header("location:../../../view/admin/contacts/all_contact.php");
}