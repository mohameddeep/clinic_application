<?php 
session_start();
require '../../public/inc/user/header.php';
require '../../public/inc/user/nav.php';

?>





<div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">login</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form" action="../../handelers/user/auth/register.php" method="post">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" >
                            <?php if(isset($_SESSION['error']["name"]) && !empty($_SESSION['error']["name"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["name"]; ?></p>

                        <?php }?>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone" >
                            <?php if(isset($_SESSION['error']["Phone"]) && !empty($_SESSION['error']["Phone"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["Phone"]; ?></p>

                        <?php }?>
                        </div>
                        
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
                        
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Create account</button>
                </form>
                <div class="d-flex justify-content-center gap-2">
                    <span>already have an account?</span><a class="link" href="login.php"> login</a>
                </div>
            </div>
            <?php unset($_SESSION['error']) ?>

</div>








<?php 
require '../../public/inc/user/footer.php';

?>