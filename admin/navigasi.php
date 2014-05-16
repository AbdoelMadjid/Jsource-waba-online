<?php
session_start();
?>
<hr/>
<a href="#Welcome<?php echo $_SESSION['admin'];?>"><input type="submit" value="Hello <?php echo $_SESSION['admin'];?>"></a> &nbsp; | &nbsp;
<a href="produk.php"><input type="submit" value="Produk"></a> &nbsp; | &nbsp;
<a href="admin.php"><input type="submit" value="Daftar Order"></a> &nbsp; | &nbsp;
<a href="logout.php"><input type="submit" value="Logout"></a>