<?php
session_start();
?>
<a href="#Welcome<?php echo $_SESSION['user'];?>"><input type="submit" value="Hello <?php echo $_SESSION['user'];?>"></a> &nbsp; | &nbsp;
<a href="items.php"><input type="submit" value="Produk"></a> &nbsp; | &nbsp;
<a href="cart.php"><input type="submit" value="Keranjang Belanja"></a> &nbsp; | &nbsp;
<a href="transaksi.php"><input type="submit" value="History Transaksi"></a> &nbsp; | &nbsp;
<a href="logout.php"><input type="submit" value="Logout"></a>
<hr/>