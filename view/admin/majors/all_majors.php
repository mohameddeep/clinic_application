
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
                <h3 class="card-title">get all majors</h3>
                <?php if(isset($_SESSION['delet_major'])){?>
                    <div class="alert alert-primary" role="alert">
  <?php  if(isset($_SESSION['delet_major'])){ echo $_SESSION['delet_major']; } ""; ?>
</div>

                <?php } elseif(isset($_SESSION['edit_major'])){ ?>

                <div class="alert alert-primary" role="alert">
  <?php  if(isset($_SESSION['edit_major'])){ echo $_SESSION['edit_major']; } ""; ?>
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
                      <th>major name</th>
                      <th>image</th>
                      <th>add at</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                  $allmajors=getDataFromTable("major",$con);
                  foreach($allmajors as $major){


                
                  
                  ?>
                    <tr>
                      <td><?php echo $major['name']; ?></td>
                      <td><img src="../../../public/file/<?php echo $major['image']; ?>" width="30px" alt=""></td>
                      <td><?php echo $major['created_at']; ?></td>
                      <td><a href="edit_major.php?id=<?php echo $major['id']; ?>"><button class="btn btn-primary">edit</button> </a>
                      <a href="../../../handelers/admin/majors/delete_major.php?id=<?php echo $major['id']; ?>"><button class="btn btn-danger">delete</button></a></td>
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
    <?php unset($_SESSION['delete_major'],$_SESSION['edit_major']); ?>
</div>


<?php 
require '../../../public/inc/admin/footer.php';

?>