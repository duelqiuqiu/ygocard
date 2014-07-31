<?php
@include 'h.php';
@include 'getname.php';
@include 'getbag.php';
include 'getjb.php';
@include 'geteff.php';
$id=$_GET['id'];
echo '<img src="https://raw.githubusercontent.com/mycard/ygopro-images/gh-pages/'.$id.'.jpg" alt="'.$id.'"/><br>';
getbag($id);
echo '<br>';
getname($id);
echo '<br>';
getjb($id);
echo '<br>';
geteff($id);
include 'power.php';
echo '<br>所有卡图来自my-card.in';
?>
