<?php
include '../config.php';
if(!isset($_SESSION['admin'])){
    echo"<script>document.location='index.php';</script>";
}
$id=$_REQUEST['id'];
$sql=mysql_query("select * from transaksi where id='$id'");
$show=mysql_fetch_object($sql);
$yoona=mysql_query("select * from users where id='$show->person_id'");
$nhk=  mysql_fetch_object($yoona);
$wew1=$nhk->nama_depan;
$wew2=$nhk->nama_belakang;
?>

<table style="background-color: #00cccc;border: #0000cc" border="1">
    <tr>
        <td>No Transaksi</td>
        <td><?php echo $show->id;?></td>
    </tr>
    <tr>
        <td>Tanggal Order</td>
        <td><?php echo $show->tanggal;?></td>
    </tr>
    <tr>
        <td>Nama Pemesan</td>
        <td><?php echo $wew1." ".$wew2;?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $show->email;?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?php echo $show->alamat;?></td>
    </tr>
    <tr>
        <td>No Telp/HP</td>
        <td><?php echo $show->no_telp;?></td>
    </tr>
    <tr>
        <td>Total Order</td>
        <td><?php echo $show->amount;?></td>
    </tr>
</table>
<hr/>
<table  style="background-color: #cccccc;border: #0000cc" border="1">
    <tr>
        <td>Nama Produk</td>
        <td>Harga</td>
        <td>jumlah</td>
        <td>Sub Total</td>
    </tr>
    <?php
    $person_id=$show->person_id;
    $trans_id=$show->id;
    $sub=  mysql_query("select * from addtocart where person_id='$person_id' and isEnd='y' and trans_id='$trans_id'");
    while ($row = mysql_fetch_array($sub)) {
    $ide=$row['item_id'];
    $run=mysql_query("select * from items where id='$ide'");
    $anata=  mysql_fetch_object($run);
    $gg=$anata->nama_items;
    $subtotal=$row['harga']*$row['qty'];
    $total=+$subtotal;
    ?>
    <tr>
        <td><?php echo $gg; ?></td>
        <td><?php echo $row['harga']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td><?php echo $subtotal; ?></td>
    </tr>
    <?
    }
    ?>
    <tr>
        <td colspan="3" align="right">Total Pembelian</td>
        <td><?php echo $total;?></td>
    </tr>
</table>