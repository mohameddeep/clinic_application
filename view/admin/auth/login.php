<?php 
session_start();
require '../../../public/inc/user/header.php';


?>
<div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">admin login page</a></li>
                    
                </ol>
            </nav>
            <?php if(isset($_SESSION['error_info']) && !empty($_SESSION['error_info'])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error_info'] ?></p>

                        <?php }?>
            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form" method="post" action="../../../handelers/admin/auth/login.php">

                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" >
                    </div>
                    </nav>
            <?php if(isset($_SESSION['error']['email']) && !empty($_SESSION['error']['email'])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']['email'] ?></p>

                        <?php }?>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="password" name="password" class="form-control" id="password" >
                    </div>
                    </nav>
            <?php if(isset($_SESSION['error']['password']) && !empty($_SESSION['error']['password'])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']['password'] ?></p>

                        <?php }?>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't have an account?</span><a class="link" href="register.php">create account</a>
                </div>
            </div>

        </div>


        </div>
        <?php unset($_SESSION['error_info'],$_SESSION['error']); ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../public/assets/scripts/home.js"></script>
</body>

</html>