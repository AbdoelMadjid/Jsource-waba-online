<?php
include './config.php';
if(isset($_SESSION['user'])){
    echo"<script>document.location='cart.php';</script>";
}else{
    echo"<script>document.location='login.php';</script>";
}
?>
