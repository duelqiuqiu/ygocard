<?php
include 'h.php';
$y=glob("ydk/*.ydk");
echo '卡组列表<hr>';
foreach($y as $dk){
$dk=explode("ydk/",$dk);
$dk=explode(".ydk",$dk[1]);
echo '<a href="ydk.php?ydk='.$dk[0].'">'.$dk[0].'</a><br>';
}
include 'power.php';
?>
