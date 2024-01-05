
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
                <h3 class="card-title">get all contacts</h3>
                <?php if(isset($_SESSION['delete_contact'])){?>
                    <div class="alert alert-primary" role="alert">
  <?php  if(isset($_SESSION['delete_contact'])){ echo $_SESSION['delete_contact']; } ""; ?>
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
                      <th>subject</th>
                      <th>message </th>
                      <th>add at</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                  $allcontacts=getDataFromTable("contacts",$con,["*"]);
                  foreach($allcontacts as $contact){


                
                  
                  ?>
                    <tr>
                      <td><?php echo $contact['name']; ?></td>
                      <td><?php echo $contact['email']; ?></td>
                      <td><?php echo $contact['phone']; ?></td>
                      <td><?php echo $contact['subject']; ?></td>
                      <td><?php echo $contact['message']; ?></td>
                      <td><?php echo $contact['created_at']; ?></td>
                      <td> <a href="../../../handelers/admin/contacts/delete.php?id=<?php echo $contact['id']; ?> "><button class="btn btn-danger">delete</button></a></td>
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
    <?php unset($_SESSION['delete_contact']); ?>
</div>


<?php 
require '../../../public/inc/admin/footer.php';

?>