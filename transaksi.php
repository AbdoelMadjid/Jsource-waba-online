<?php
session_start();
include './config.php';
include './navigasi.php';
$person_user=$_SESSION['user'];
$sl=  mysql_query("select * from users where username='$person_user'");
$igaa=  mysql_fetch_object($sl);
$person_id=$igaa->id;
$sql=  mysql_query("select * from transaksi where person_id='$person_id' order by id desc");
while($show=mysql_fetch_object($sql)){
    $saranghae=mysql_query("select * from users where id='$show->person_id'");
    $anata=  mysql_fetch_object($saranghae);
    $gg1=$anata->nama_depan;
    $gg2=$anata->nama_belakang;
?>

<table border="1">
    <tr>
        <td style="background-color: #ff0000;border: #ffffff; color: #ffffff">No Transaksi</td>
        <td><?php echo $show->id;?></td>
    </tr>
    <tr>
        <td style="background-color: #ff0000;border: #ffffff; color: #ffffff">Tanggal Order</td>
        <td><?php echo $show->tanggal;?></td>
    </tr>
    <tr>
        <td style="background-color: #ff0000;border: #ffffff; color: #ffffff">Nama Pemesan</td>
        <td><?php echo $gg1." ".$gg2;?></td>
    </tr>
    <tr>
        <td style="background-color: #ff0000;border: #ffffff; color: #ffffff">Email</td>
        <td><?php echo $show->email;?></td>
    </tr>
    <tr>
        <td style="background-color: #ff0000;border: #ffffff; color: #ffffff">Alamat</td>
        <td><?php echo $show->alamat;?></td>
    </tr>
    <tr>
        <td style="background-color: #ff0000;border: #ffffff; color: #ffffff">No Telp/HP</td>
        <td><?php echo $show->no_telp;?></td>
    </tr>
    <tr>
        <td style="background-color: #ff0000;border: #ffffff; color: #ffffff">Total Order</td>
        <td><?php echo "Rp.".formatrp($show->amount).",-";?></td>
    </tr>
    <tr>
        <td style="background-color: #ff0000;border: #ffffff; color: #ffffff"><form method="post">
                <input type="submit" name="show<?php echo $show->id;?>" value="Detail">
            </form></td>
        <td>
         <?php
         if(isset($_REQUEST['show'.$show->id])):
         ?>
            <table>
                <tr  style="background-color: #66cc00;border: #0000cc; margin: 100px;">
        <td>No</td>
        <td>Nama Produk</td>
        <td>Harga</td>
        <td>jumlah</td>
        <td>Sub Total</td>
    </tr>
    <?php
    $no=1;
    $trans_id=$show->id;
    $sub=  mysql_query("select * from addtocart where person_id='$person_id' and isEnd='y' and trans_id='$trans_id'");
    while ($row = mysql_fetch_array($sub)) {
    $ide=$row['item_id'];
    $run=mysql_query("select * from items where id='$ide'");
    $anata=  mysql_fetch_object($run);
    $gg=$anata->nama_items;
    $subtotal=$row['harga']*$row['qty'];
    ?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $gg; ?></td>
        <td><?php echo "Rp.".formatrp($row['harga']).",-"; ?></td>
        <td align="center"><?php echo $row['qty']; ?></td>
        <td><?php echo "Rp.".formatrp($subtotal).",-"; ?></td>
    </tr>
    <?
    }
    ?>
</table>
         <?php
         else:
             
         endif;
         ?>
            
        </td>
    </tr>
</table>
<br/>
<?php }?>