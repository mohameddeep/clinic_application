<?php 
session_start();
session_destroy();
header("location:../../../view/admin/auth/login.php");