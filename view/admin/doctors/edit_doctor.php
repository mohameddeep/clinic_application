<?php 
session_start();
if(!isset($_SESSION["admin_login"])){
  header("location:../auth/login.php");
}
if(isset($_GET['id'])){
    $doctor_id=$_GET['id'];
  }else{
    header("location:all_doctors.php");
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
            <h1>Edit Doctor</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
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
              <?php
              

              $filter=[
                "id"=>$doctor_id
              ];

              $doctor=getonerow("doctors",$con, $col = ["*"],$filter);
            
            

            

             

               ?>
              <form method="post" action="../../../handelers/admin/doctors/edit_doctor.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $doctor['id'] ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" value="<?php echo $doctor['name'] ?? ""?>" name="name" id="exampleInputEmail1" >
                  </div>
                  <?php if(isset($_SESSION['error']["name"]) && !empty($_SESSION['error']["name"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["name"]; ?></p>

                        <?php }?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">city</label>
                    <input type="text" class="form-control" value="<?php echo $doctor['city'] ?? "" ?>" name="city" id="exampleInputPassword1" placeholder="city...">
                  </div>
                  <?php if(isset($_SESSION['error']["city"]) && !empty($_SESSION['error']["city"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["city"]; ?></p>

                        <?php }?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">governate</label>
                    <input type="text" class="form-control" value="<?php echo $doctor['governate'] ?? "" ?>" name="governate" id="exampleInputPassword1" placeholder="governate..">
                  </div>
                  <?php if(isset($_SESSION['error']["governate"]) && !empty($_SESSION['error']["governate"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["governate"]; ?></p>

                        <?php }?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">phone</label>
                    <input type="text" class="form-control" value="<?php echo $doctor['phone'] ?? ""?>" name="phone" id="exampleInputPassword1" placeholder="phone...">
                  </div>
                  <?php if(isset($_SESSION['error']["phone"]) && !empty($_SESSION['error']["phone"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["phone"]; ?></p>

                        <?php }?>
                  <div class="form-group">
                    <textarea name="descr" id="" cols="30" rows="5"><?php echo $doctor['descr'] ?? "" ?></textarea>
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
                  <button type="submit" name="edit_doctor" class="btn btn-primary">edit doctor</button>
                </div>
              </form>

            </div>
            <!-- /.card -->

           

          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <?php unset($_SESSION['error']); ?>
    <!-- /.content -->
  </div>


<?php 
require '../../../public/inc/admin/footer.php';

?>