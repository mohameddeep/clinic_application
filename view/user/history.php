<?php 
session_start();
if(!isset($_SESSION["user_login"])){
  header("location:login.php");
}
require '../../public/inc/user/header.php';
require '../../public/inc/user/nav.php';
require "../../core/db.php";
require "../../core/function.php";
require "../../core/validation.php";

?>

<div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">history</li>
                </ol>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">major</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    if(isset($_GET['id'])){
                        $allappoinments=getDataFromTable("appoinment",$con,["*"],["user_id" => $_GET['id']]);

                   

                
                $id=0;
                foreach($allappoinments as $appoinment){
                    $id++




                ?>
                        <th scope="row"><?php echo $id ?></th>
                        <td><?php echo $appoinment['created_at'] ?></td>
                        <td ><?php echo $appoinment['doctor_name'] ?></td>
                        <td><?php echo $appoinment['speciality'] ?></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <?php 
require '../../public/inc/user/footer.php';

?>
