<?php 
session_start();
if(!isset($_SESSION["admin_login"])){
  header("location:../auth/login.php");
}else{
    $admin=$_SESSION["admin_login"];
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
            <h1>edit  Major</h1>
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

             
              <form method="post" action="../../../handelers/admin/auth/edit.php" enctype="multipart/form-data">

              <input type="hidden" name="major_id" value="<?php echo $admin['id'] ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" value="<?php if(isset($admin['name'])){ echo $admin['name']; }; ?>" name="name" >
                  </div>
                  <?php if(isset($_SESSION['error']["name"]) && !empty($_SESSION['error']["major_name"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["major_name"]; ?></p>

                        <?php }?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="email" class="form-control" value="<?php if(isset($admin['email'])){ echo $admin['email']; }; ?>" name="email" id="exampleInputEmail1">
                  </div>
                  <?php if(isset($_SESSION['error']["email"]) && !empty($_SESSION['error']["email"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["email"]; ?></p>

                        <?php }?>
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="password" class="form-control"  name="password" id="exampleInputEmail1" >
                  </div>
                  <?php if(isset($_SESSION['error']["password"]) && !empty($_SESSION['error']["password"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["password"]; ?></p>

                        <?php }?>
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
                  <?php if(isset($_SESSION['error']["image"]) && !empty($_SESSION['error']["image"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["image"]; ?></p>

                        <?php }?>
                  
                </div>
                <!-- /.card-body -->
<div> <img src="../../../public/file/<?php echo $admin['image']?>" width="50px" alt=""></div>
                <div class="card-footer">
                  <button type="submit" name="edit_admin" class="btn btn-primary">edit admin</button>
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