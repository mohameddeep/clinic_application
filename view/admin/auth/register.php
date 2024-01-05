<?php 
session_start();
require '../../../public/inc/user/header.php';


?>
<div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">admin register page</a></li>
                    
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form" method="post" action="../../../handelers/admin/auth/register.php" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label required-label" for="email">name</label>
                        <input type="text" class="form-control" name="name" id="email" >
                    </div>

                    <?php if(isset($_SESSION['error']["name"]) && !empty($_SESSION['error']["name"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["name"]; ?></p>

                        <?php }?>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" >
                    </div>
                    <?php if(isset($_SESSION['error']["email"]) && !empty($_SESSION['error']["email"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["email"]; ?></p>

                        <?php }?>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="password" name="password" class="form-control" id="password" >
                    </div>
                    <?php if(isset($_SESSION['error']["password"]) && !empty($_SESSION['error']["password"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["password"]; ?></p>

                        <?php }?>
                    <div class="form-group">
                    <label for="exampleInputFile" class="mb-2">your image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        
                      </div>
                    </div>
                  </div>
                  <?php if(isset($_SESSION['error']["image"]) && !empty($_SESSION['error']["image"])){?>
                            <p class="text-danger"> <?php echo$_SESSION['error']["image"]; ?></p>

                        <?php }?>
                  <br>
                    <button type="submit" name="register" class="btn btn-primary">register</button>
                </form>
                
            </div>

        </div>


        </div>
        <?php unset($_SESSION['error']); ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../public/assets/scripts/home.js"></script>
</body>

</html>