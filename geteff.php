<?php
function geteff($id){
$db=new pdo('sqlite:db/cards.db');
$sql=$db->query('SELECT desc FROM texts WHERE id IN ('.$id.')');
$desc=$sql->fetchAll();
echo $desc[0]["desc"];
}
?>
