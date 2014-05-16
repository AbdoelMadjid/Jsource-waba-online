<?php
include './config.php';
include './navigasi.php';
if(!isset($_SESSION['user'])){
    echo"<script>document.location='index.php';</script>";
}
$person=$_SESSION['user'];
$sqlperson=  mysql_query("select * from users where username='$person'");
$prow=mysql_fetch_object($sqlperson);
$person_id=$prow->id;
$sq=  mysql_query("select * from addtocart where person_id='$person_id' and isEnd='n'");
$check=  mysql_num_rows($sq);
if($check>0):
    ?>
<h3>Keranjang Belanja</h3>
<table width="70%" border="1">
    <tr style="background-color: #cc0000;color: #ffffff">
        <td>Nama Produk</td>
        <td>Jumlah</td>
        <td>Ubah</td>
        <td>Hapus</td>
        <td>Sub Total</td>
    </tr>
    <?php
    while ($row = mysql_fetch_array($sq)) {
    $iid=$row['item_id'];
    ?>
    <form method="post" action="akses.php">
    <tr>
        <?php $rsq=mysql_query("select * from items where id='$iid'");
        $obj=  mysql_fetch_object($rsq);
        $vo=$obj->nama_items;
        $subitem=$row['qty']*$row['harga'];
        $total+=$subitem;
        ?>
        <td width="100px"><?php echo $vo;?></td>
        <td width="100px"><input type="text" value="<?php echo $row['qty']?>" name="qty1"></td>
        <td width="100px">
                <input type="hidden" name="itmid" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="prsnid" value="<?php echo $person_id; ?>">
                <input type="submit" name="ganti" value="Ubah">
            </td>
        <td width="100px">
                <input type="submit" name="hapus" value="Hapus">
            </td>
        <td width="100px"><?php echo $subitem;?></td>
    </tr>
    </form>
    <?php } ?>
    <tr>
        <td colspan="4"><div align="right">Total Pembelian</div></td>
        <td><?php echo $total;?></td>
    </tr>
    <form method="post" action="akses.php">
    <tr>
        <?php
        $sqr=  mysql_query("select * from users where id='$person_id'");
        while ($row1 = mysql_fetch_array($sqr)) {
            ?>
    <input type="hidden" name="tid" value="<?php echo $row1['id'];?>">
    <input type="hidden" name="temail" value="<?php echo $row1['email'];?>">
    <input type="hidden" name="talamat" value="<?php echo $row1['alamat'];?>">
    <input type="hidden" name="tno_telp" value="<?php echo $row1['no_telp'];?>">
    <input type="hidden" name="tamount" value="<?php echo $total;?>">
        <?
        }
        ?>
        <td colspan="3"><input type="submit" name="back" value="Kembali Belanja"></td>
        <td colspan="2"><input type="submit" name="selesai" value="Selesaikan Belanja"></td>
    </tr>
    </form>
</table>
<?php
else:
    echo"Keranjang belanja anda masih kosong.<br/>
Klik <a href='items.php'>disini</a> Berikut untuk menambah item.";
endif;
?>