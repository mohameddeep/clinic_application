<?php 
session_start();
if(!isset($_SESSION["admin_login"])){
  header("location:../auth/login.php");
}
require '../../../public/inc/admin/header.php';
require '../../../public/inc/admin/nav.php';
require '../../../public/inc/admin/aside.php';
require '../../../core/db.php';
require '../../../core/validation.php';
require '../../../core/function.php';

?>


<div class="content-wrapper">

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php $getallappoinments=getDataFromTable("doctors", $con,["*"]); ?>
                
                <h3><?php echo count($getallappoinments)?></h3>

                <p>all appoinments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php $allmajors=getDataFromTable("major", $con,["*"]); ?>
                
                <h3><?php echo count($allmajors)?></h3>

                <p>all majors</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php $allusers=getDataFromTable("user", $con,["*"]); ?>
                <h3><?php echo count($allusers)?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php $alldoctors=getDataFromTable("doctors", $con,["*"]); ?>
                <h3><?php echo count($alldoctors)?></h3>

                <p>all doctors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
</section>
</div>


<?php 
require '../../../public/inc/admin/footer.php';

?>