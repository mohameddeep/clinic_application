<?php 
session_start();
require "../../core/db.php";
require "../../core/function.php";
require "../../core/validation.php";

if(isset($_GET['code'])){
    $code=$_GET['code'];

    $filter=["security_code" => $code];
    
    $code=getonerow("user",$con,["security_code"],$filter);

if($code){
    $newcode=md5(date("H:i:s"));
$data=["security_code" => $newcode,"actived" => true];

        $update=updateData("user",  $data, $con, $filter);

    if($update){

        $_SESSION['verfied_account']="your account is verfied";

        ?>


        <a class="btn btn-primary" href="login.php">login</a>
    <?php }
}
}else{
    header("location:register.php");
}