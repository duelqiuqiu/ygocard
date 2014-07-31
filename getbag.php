<?php
function getbag($id){
$db=new pdo('sqlite:db/cards.db');
$sql=$db->query('SELECT ot FROM datas WHERE id IN ('.$id.')');
$ot=$sql->fetchAll();
if($ot[0]["ot"]==1){
echo 'OCG专有卡';
}elseif($ot[0]["ot"]==2){
echo 'TCG专有卡';
}
}
?>
