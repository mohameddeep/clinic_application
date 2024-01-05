<?php 
session_start();
require '../../public/inc/user/header.php';

?>
<div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item active" aria-current="page">reset my password</li>
                </ol>
            </nav>
            <?php if(isset($_SESSION['wrong_email']) && !empty($_SESSION['wrong_email'])){?>
                            <p class="text-danger"> <?php echo$_SESSION['wrong_email'] ?></p>

                            <?php }else if(isset($_SESSION['send_email']) && !empty($_SESSION['send_email'])){?>
                                <p class="text-danger"> <?php echo$_SESSION['send_email'] ?></p>
                                <?php } ?>
                            <?php  

                            if(!isset($_GET['code'])){?>
                            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form" method="post" action="../../handelers/user/auth/checkemail.php">

                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" >
                        <?php if(isset($_SESSION['error']["email"]) && !empty($_SESSION['error']["email"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["email"]; ?></p>

                        <?php }?>
                    </div>
                    <button type="submit" name="checkemail" class="btn btn-primary">send link to my email</button>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>back to login page </span><a class="link" href="login.php">login page</a>
                </div>
            </div>


                                <!-- put my new password  -->


                            <?php }elseif(isset($_GET['code']) && isset($_GET['email'])){?>
                                <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form" method="post" action="../../handelers/user/auth/restpassword.php">

                    <div class="mb-3">
                        <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
                        <label class="form-label required-label" for="email">password</label>
                        <input type="password" class="form-control" name="password" id="email" >
                        <?php if(isset($_SESSION['error']["password"]) && !empty($_SESSION['error']["password"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["password"]; ?></p>

                        <?php }?>
                    </div>
                    <button type="submit" name="newpassword" class="btn btn-primary">resetpassword</button>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>back to login page </span><a class="link" href="login.php">login page</a>
                </div>
            </div>



                           <?php  }
                            ?>


            

        </div>

    


<?php unset($_SESSION['wrong_email'],$_SESSION['error'],$_SESSION['send_email']); ?>
</div>


   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../public/assets/scripts/home.js"></script>
</body>

</html>