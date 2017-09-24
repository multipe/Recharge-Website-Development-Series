<?php


$dbcon=mysql_connect('localhost','root','');
$dbselect=mysql_select_db('recharge',$dbcon);

if(!$dbcon OR !$dbselect){
 echo 'Database connection failed!';
exit;
}

?>