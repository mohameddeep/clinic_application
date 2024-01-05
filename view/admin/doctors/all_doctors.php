
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
                <h3 class="card-title">get all doctors</h3>
                <?php if(isset($_SESSION['delet_doctor'])){?>
                    <div class="alert alert-primary" role="alert">
  <?php  if(isset($_SESSION['delete_doctor'])){ echo $_SESSION['delete_doctor']; } ""; ?>
</div>

                <?php } elseif(isset($_SESSION['edit_doctor'])){ ?>

                <div class="alert alert-primary" role="alert">
  <?php  if(isset($_SESSION['edit_doctor'])){ echo $_SESSION['edit_doctor']; } ""; ?>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>name</th>
                      <th>city</th>
                      <th>governate</th>
                      <th>phone</th>
                      <th>major name</th>
                      <th>descr</th>
                      <th>image</th>
                      <th>add at</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                  $alldoctors=getDataFromTable("doctors",$con,["*"]);
                  foreach($alldoctors as $doctor){


                
                  
                  ?>
                    <tr>
                      <td><?php echo $doctor['name']; ?></td>
                      <td><?php echo $doctor['city']; ?></td>
                      <td><?php echo $doctor['governate']; ?></td>
                      <td><?php echo $doctor['phone']; ?></td>
                      <td><?php
                      $filter=["id" =>$doctor['major_id']];
                      $majorname=getonerow("major",$con,["*"],$filter);
                      echo $majorname['name'];
                       ?></td>

                      <td><?php echo $doctor['descr']; ?></td>
                      <td><img src="../../../public/file/<?php echo $doctor['image']; ?>" width="30px" alt=""></td>
                      <td><?php echo $doctor['created_at']; ?></td>
                      <td><a href="edit_doctor.php?id=<?php echo $doctor['id']; ?>"><button class="btn btn-primary">edit</button> </a>
                      <a href="../../../handelers/admin/doctors/delete_doctor.php?id=<?php echo $doctor['id']; ?>"><button class="btn btn-danger">delete</button></a></td>
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
    <?php unset($_SESSION['delete_doctor'],$_SESSION['edit_doctor']); ?>
</div>


<?php 
require '../../../public/inc/admin/footer.php';

?>