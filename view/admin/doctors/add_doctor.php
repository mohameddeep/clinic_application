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
            <h1>Add New Doctor</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="alert alert-primary" role="alert">
  <?php  if(isset($_SESSION['add_doctor'])){ echo $_SESSION['add_doctor']; } ""; ?>
</div>
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
              <form method="post" action="../../../handelers/admin/doctors/add_doctor.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter your name...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">city</label>
                    <input type="text" class="form-control" name="city" id="exampleInputPassword1" placeholder="city...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">governate</label>
                    <input type="text" class="form-control" name="governate" id="exampleInputPassword1" placeholder="governate..">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">phone</label>
                    <input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="phone...">
                  </div>
                  <div class="form-group">
                    <select class="form-select" name="major_id" aria-label="Default select example">
                    <option selected>select your speciality</option>
                    <?php $majors=getDataFromTable("major",$con,$cols=["id","name"]);
                    foreach($majors as $major){?>
                    <option value="<?php echo $major['id'] ?>"><?php echo $major['name']; ?></option>

                    <?php } ?>
                    
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">doctor information</label><br>
                    <textarea name="descr" id="" cols="30" rows="5"></textarea>
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
                  <button type="submit" name="add_doctor" class="btn btn-primary">add doctor</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <?php unset($_SESSION['add_doctor']); ?>
    <!-- /.content -->
  </div>


<?php 
require '../../../public/inc/admin/footer.php';

?>