<?php 
session_start();
if(!isset($_SESSION["user_login"])){
  header("location:login.php");
}
require '../../public/inc/user/header.php';
require '../../public/inc/user/nav.php';
require "../../core/db.php";
require "../../core/function.php";
require "../../core/validation.php";
?>

<div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../user/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">majors</li>
                </ol>
            </nav>
            <div class="majors-grid">
            <?php $majors=getDataFromTable("major", $con);
                foreach($majors as $major){ ?>
            <div class="majors-grid">
                <div class="card p-2" style="width: 18rem;">
                    <img src="../../public/file/<?php echo $major['image'] ?>" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"><?php echo $major['name'] ?></h4>
                        <a href="../doctor/doctors.php?id=<?php echo $major['id'] ?> " class="btn btn-outline-primary card-button">Browse Doctors</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>

            <nav class="mt-5" aria-label="navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link page-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                              </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link page-next" href="#" aria-label="Next">
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php 
require '../../public/inc/user/footer.php';

?>
