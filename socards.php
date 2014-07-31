<?php
function socards($key){
$dbh=new pdo('sqlite:db/cards.db');
$sql="SELECT id,name,desc FROM texts where desc like '%$key%' or name like '%$key%'";
try{
$stmt=$dbh->prepare($sql);
$stmt->execute();
$stmt->bindColumn(1,$id);
$stmt->bindColumn(2,$name);
$stmt->bindColumn('desc',$desc);
while($row=$stmt->fetch(PDO::FETCH_BOUND)){
$data='<hr>名字：'.$name.'<br>效果：'.$desc;
$data=str_replace($key,"<FONT color=#f70000>$key</FONT>",$data);
$data='<hr>ID：<a href="eff.php?id='.$id.'" target="_blank">'.$id.'</a>'.$data;
print $data;
}
}
catch(PDOException $e){
print $e->getMessage();
}
}
include 'h.php';
echo '卡片搜索<hr/><form accept-charset="utf-8" action="socards.php" method="get"><input type="text" name="key" value="'.$_GET['key'].'"/><br/>
<input type="submit" value="搜索卡片"/>
</form>';
if($_GET['key']==''){
echo '';
}else{
$key=$_GET['key'];
socards($key);
}
?>
