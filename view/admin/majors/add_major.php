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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Major</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php if(isset($_SESSION['add_major'])){?>
        <div class="alert alert-primary" role="alert">
  <?php  if(isset($_SESSION['add_major'])){ echo $_SESSION['add_major']; } ""; ?>
</div>

    <?php } ?>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
             
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="../../../handelers/admin/majors/add_major.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" name="major_name" id="exampleInputEmail1" placeholder="Enter major...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add_major" class="btn btn-primary">add major</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <?php unset($_SESSION['add_major']); ?>
    <!-- /.content -->
  </div>


<?php 
require '../../../public/inc/admin/footer.php';

?>