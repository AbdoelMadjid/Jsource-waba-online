<?php
include './config.php';
if(isset($_REQUEST['ganti'])){
    $itmid=$_REQUEST['itmid'];
    $pid=$_REQUEST['prsnid'];
    $qty = $_REQUEST['qty1'];
    $ganti=  mysql_query("UPDATE addtocart SET  qty =  '$qty' WHERE  id ='$itmid' and person_id='$pid'");
}
if(isset($_REQUEST['hapus'])){
    $uid=$_REQUEST['itmid'];
    $pid=$_REQUEST['prsnid'];
    $hapus=mysql_query("delete from addtocart where id='$uid' and person_id='$pid'");
}
if(isset($_REQUEST['selesai'])){
    $tid=$_REQUEST['tid'];
    $temail=$_REQUEST['temail'];
    $talamat=$_REQUEST['talamat'];
    $tno_telp=$_REQUEST['tno_telp'];
    $tamount=$_REQUEST['tamount'];
    $date=  date("Y-m-d");
    $default=  mysql_query("select * from transaksi order by id desc");
    $def=  mysql_fetch_object($default);
    $defid=$def->id+1;
    $intrans=  mysql_query("insert into transaksi values('','$tid','$temail','$talamat','$tno_telp','$tamount','$date')");
    $ganti=  mysql_query("UPDATE addtocart SET  isEnd =  'y', trans_id = '$defid' WHERE  person_id='$tid' and trans_id='0'");
    echo "<script>document.location='transaksi.php';</script>";
}
if(isset($_REQUEST['back'])){
    echo "<script>document.location='items.php';</script>";
}
?>
<script>
    document.location='cart.php';
</script>