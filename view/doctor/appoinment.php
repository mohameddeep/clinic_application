<?php 
session_start();
if(!isset($_SESSION["user_login"])){
header("location:login.php");
}

if(isset($_GET['id'])){
    $doctor_id=$_GET['id'];
}
require '../../public/inc/user/header.php';
require '../../public/inc/user/nav.php';
require "../../core/db.php";
require "../../core/function.php";
require "../../core/validation.php";
?>

<div class="container">
<?php $doctor_info=getonerow("doctors",$con,["*"],["id" =>$doctor_id])?>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../user/index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../doctor/doctors.php">doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $doctor_info['name'] ?></li>
                </ol>
            </nav>
            <?php if(isset($_SESSION['add_appoinment']) && !empty($_SESSION['add_appoinment'])){?>
                            <p class="text-primary"> <?php echo $_SESSION['add_appoinment']; ?></p>

                        <?php } ?>
            <div class="d-flex flex-column gap-3 details-card doctor-details">
                <div class="details d-flex gap-2 align-items-center">
                    <img src="../../public/file/<?php echo $doctor_info['image'] ?>" alt="doctor" class="img-fluid rounded-circle" height="150"
                        width="150">
                                             
                       
                    <div class="details-info d-flex flex-column gap-3 ">
                        <h1 class="card-title fw-bold"><?php echo $doctor_info['name'] ?></h1>
                        <?php $major=getonerow("major",$con,["*"],["id" =>$doctor_info['major_id']])?>
                        <h3 class="card-title fw-bold"><?php echo $major['name'] ?></h3>
                        <h6 class="card-title fw-bold"><?php echo $doctor_info['descr'] ?></h6>
                      
                    </div>
                </div>
                <hr />
                <form class="form" method="post" action="../../handelers/doctors/bookappoinment.php">
                    <input type="hidden" name="id" value="<?php echo $doctor_info['id'] ?>">
                    <input type="hidden" name="doctor_name" value="<?php echo $doctor_info['name']  ?>">
                    <input type="hidden" name="speciality" value="<?php echo $major['name'] ?>">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel"  name="phone" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" >
                        </div>
                    </div>
                    <button type="submit" name="booking" class="btn btn-primary">Confirm Booking</button>
                    

                </form>



            </div>
            <br>
            <button type="submit" name="booking" class="btn btn-primary">
                         <a type="button" class="btn  " 
                         href="../user/history.php?id=<?php echo $_SESSION['user_login']['id'] ?>">show my history</a></button>

        </div>
<?php unset($_SESSION['add_appoinment']); ?>


<?php 
require '../../public/inc/user/footer.php';

?>