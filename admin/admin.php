<?php
include '../config.php';
if(!isset($_SESSION['admin'])){
    echo"<script>document.location='index.php';</script>";
}
$cima=  mysql_query("select * from transaksi");
?>
<h1>Admin</h1>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Nama Pelanggan</td>
        <td>Total Order</td>
        <td>Tanggal Order</td>
        <td>Action</td>
    </tr>
    <?php
    while ($row = mysql_fetch_array($cima)) {
        $person_id=$row['person_id'];
        $yoona=mysql_query("select * from users where id='$person_id'");
        $nhk=  mysql_fetch_object($yoona);
        $wew1=$nhk->nama_depan;
        $wew2=$nhk->nama_belakang;
    ?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $wew1." ".$wew2;?></td>
        <td><?php echo $row['amount'];?></td>
        <td><?php echo $row['tanggal'];?></td>
        <td><a href="detail.php?id=<?php echo $row['id'];?>"><img src="../images/details.gif"></a></td>
    </tr>
    <? } ?>
</table>
<?php
include './navigasi.php';
?>