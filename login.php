<?php
include './config.php';
?>
<form method="post">
<input type="text" name="username"><br/>
<input type="password" name="password"><br/>
<input type="submit" name="Sub" value="Login">
</form>
<?php
$user=$_REQUEST['username'];
$pass=$_REQUEST['password'];
if(isset($_REQUEST['Sub'])){
    $sql=  mysql_query("select * from users where username='$user' and password=md5('$pass') and level='2'");
    $re=  mysql_num_rows($sql);
    if($re>0){
        $_SESSION['user']=$user;
        echo"<script>document.location='cart.php';</script>";
    }else{
        echo 'username atau password salah!';
    }   
}
?>