<?php
function getype($id){
$db=new pdo('sqlite:db/cards.db');
$sql=$db->query('SELECT type FROM datas where id IN ('.$id.')');
$type=$sql->fetchAll();
if($type[0][type]==97 || $type[0][type]==65 || $type[0][type]==8225 || $type[0][type]==8193 || $type[0][type]==8388641 || $type[0][type]==8388609)
{
echo "额外";
}else{
echo "主";
}
}
?>
