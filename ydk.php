<?php
include 'h.php';
@include 'getname.php';
$ydk=$_GET['ydk'];
if(file_exists('ydk/'.$ydk.'.ydk'))
{
$ydk=file_get_contents('ydk/'.$ydk.'.ydk');
$ydk=str_replace("#extra","",$ydk);
$ydk=str_replace("#ex","",$ydk);
$ex=explode("!side",$ydk);
$main=explode("\n",$ex[0]);
array_shift($main);
array_shift($main);
$main=array_filter($main);
$i=0;
$db=new pdo('sqlite:db/cards.db');
$exm=array();
$mm=array();
foreach($main as $m){
$sql=$db->query('SELECT type FROM datas where id IN ('.$m.')');
$type=$sql->fetchAll();
if($type[0][type]==97||$type[0][type]==65||$type[0][type]==8225||$type[0][type]==8193||$type[0][type]==8388641||$type[0][type]==8388609||$type[0][type]==12321){
$exm[$i]=$m;
}else{
$mm[$i]=$m;
}
$i=$i+1;
}
$mm=array_merge($mm);
$n=count($mm);
$i=1;
$n=$n-1;
$co=strlen($mm[$n]);
$n=$n+1;
if($co==1){
$n=$n-1;
unset($mm[$n]);
}
$mm=array_values($mm);
echo '<hr>主卡组（'.$n.'张）<hr>';
foreach($mm as $id)
{
echo $i.',<a href="eff.php?id='.$id.'">';
$na=getname($id);
echo '</a><br>';
$i=$i+1;
}
$exm=array_filter($exm);
$n=count($exm);
$i=1;
echo '<hr>额外卡组（'.$n.'张）<hr>';
foreach($exm as $id)
{
echo $i.',<a href="eff.php?id='.$id.'">';
$na=getname($id);
echo '</a><br>';
$i=$i+1;
}
$side=explode("\n",$ex[1]);
array_shift($side);
$o=count($side)-1;
unset($side[$o]);
$i=1;
$o=count($side);
echo '<hr>副卡组（'.$o.'张）<hr>';
foreach($side as $id)
{
echo $i.',<a href="eff.php?id='.$id.'">';
$na=getname($id);
echo '</a><br>';
$i=$i+1;
}
}else{
echo '游客可别乱来！<br>';
}
include 'power.php';
?>
