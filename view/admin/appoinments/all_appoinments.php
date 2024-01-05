
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

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">get all appoinment</h3>
                <?php if(isset($_SESSION['delete_appoinment'])){?>
                    <div class="alert alert-primary" role="alert">
  <?php  if(isset($_SESSION['delete_appoinment'])){ echo $_SESSION['delete_appoinment']; } ""; ?>
</div>

                <?php } ?>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>speciality</th>
                      <th>doctor name</th>
                      <th>add at</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                  $allappoinments=getDataFromTable("appoinment",$con,["*"]);
                  foreach($allappoinments as $appoinment){


                
                  
                  ?>
                    <tr>
                      <td><?php echo $appoinment['name']; ?></td>
                      <td><?php echo $appoinment['email']; ?></td>
                      <td><?php echo $appoinment['phone']; ?></td>
                      <td><?php echo $appoinment['speciality']; ?></td>
                      <td><?php echo $appoinment['doctor_name']; ?></td>
                      <td><?php echo $appoinment['created_at']; ?></td>
                      <td> <a href="../../../handelers/admin/appoinment/deleteappoinment.php?id=<?php echo $appoinment['id']; ?> "><button class="btn btn-danger">delete</button></a></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        </div>
    </div>
    <?php unset($_SESSION['delete_appoinment']); ?>
</div>


<?php 
require '../../../public/inc/admin/footer.php';

?>