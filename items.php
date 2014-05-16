<?php
include './config.php';
if(isset($_SESSION['user'])){
    include './navigasi.php';
}
$SQL1=  mysql_query("select * from items");
echo "<h3>Produk</h3>";
if(isset($_REQUEST['atc'])){
    $item_id=$_REQUEST['itemcart'];
    $personq=$_SESSION['user'];
    $sqlpersonq=  mysql_query("select * from users where username='$personq'");
    $prowq=mysql_fetch_object($sqlpersonq);
    $person_idq=$prowq->id;
    $cek=  mysql_query("select * from addtocart where item_id='$item_id' and person_id='$person_idq' and isEnd='n'");
    $rw=  mysql_fetch_object($cek);
    $harga=$_REQUEST['itemharga'];
    $person=$_SESSION['user'];
    $sqlperson=  mysql_query("select * from users where username='$person'");
    $prow=mysql_fetch_object($sqlperson);
    $person_id=$prow->id;
    $null=0;
    if($person!=null){
    if($rw->person_id==$person_id){
    if($rw->qty>=1 ){
        $ce1=  mysql_query("select * from addtocart where item_id='$item_id' and person_id='$person_id' and isEnd='n'");
        $ob=  mysql_fetch_object($ce1);
        $pr=$ob->qty+1;
        $up=mysql_query("UPDATE  addtocart SET  qty = '$pr' where item_id='$item_id' and person_id='$person_id'");
    }else{
        $sqlin=mysql_query("insert into addtocart values('','$item_id','1','$harga','$person_id','n','$null')");
    }
    }else{
        $sqlin=mysql_query("insert into addtocart values('','$item_id','1','$harga','$person_id','n','$null')");
    }
    if($sqlin or $up){
     //   echo "<div style='border-color: #ccff33;background-color: #00cc00'>";
     //   echo "1 Barang di tambah ke keranjang belanja";
     //   echo "</div>";
        echo"<script>alert('1 Barang di tambah ke keranjang belanja');</script>";
        
    }}else{
        echo"<script>alert('silahkan login untuk menambah item');</script>";
    }
}
while ($row = mysql_fetch_array($SQL1)) {
?>
<table>
    <tr>
        <td><?php echo $row['nama_items']; ?></td>
        <td>
            <form method="post">
                <input type="hidden" name="itemcart" value="<?php echo $row['id'];?>">
                <input type="hidden" name="itemharga" value="<?php echo $row['harga'];?>">
                <input type="submit" value="Add to Cart" name="atc">
            </form>
        </td>
    </tr>
</table>
<?php } ?>
<a href="cart.php"><input type="submit" value="Lihat Keranjang Belanja"></a>

