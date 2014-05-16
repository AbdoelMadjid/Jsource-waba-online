<?php
session_start();
$con=mysql_connect("localhost","root","");
$db=  mysql_select_db("toaf",$con);

function formatrp($angka){
$rupiah=number_format($angka,2,',','.');
return $rupiah;
}
?>