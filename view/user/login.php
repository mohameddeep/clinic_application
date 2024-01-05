<?php 
session_start();
require '../../public/inc/user/header.php';
require '../../public/inc/user/nav.php';

?>
<div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">login</li>
                </ol>
            </nav>
            <?php if(isset($_SESSION['verfied_account']) && !empty($_SESSION['verfied_account'])){?>
                            <p class="text-danger"> <?php echo $_SESSION['verfied_account']; ?></p>

                        <?php }elseif(isset($_SESSION['unverfied_user']) && !empty($_SESSION['unverfied_user'])){?>
                            <p class="text-danger"> <?php echo $_SESSION['unverfied_user']; ?></p>

                            <?php }elseif(isset($_SESSION['resetpassword']) && !empty($_SESSION['resetpassword'])) { ?>
                            <p class="text-danger"> <?php echo $_SESSION['resetpassword']; ?></p>

                            <?php }elseif(isset($_SESSION['wrong_info']) && !empty($_SESSION['wrong_info'])) { ?>
                            <p class="text-danger"> <?php echo $_SESSION['wrong_info']; ?></p>

                            <?php }?>


            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form" method="post" action="../../handelers/user/auth/login.php">

                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" >
                        <?php if(isset($_SESSION['error']["email"]) && !empty($_SESSION['error']["email"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["email"]; ?></p>

                        <?php }?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" >
                        <?php if(isset($_SESSION['error']["password"]) && !empty($_SESSION['error']["password"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["password"]; ?></p>

                        <?php }?>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't have an account?</span><a class="link" href="register.php">create account</a>
                </div>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't remmember your password</span><a class="link" href="restpassword.php">reset password</a>
                </div>
            </div>

        </div>
<?php unset($_SESSION['verfied_account'],$_SESSION['error'],$_SESSION['unverfied_user'],$_SESSION['resetpassword'],$_SESSION['wrong_info']); ?>

        <?php 
require '../../public/inc/user/footer.php';

?>