<?php
function getname($id){
$db=new pdo('sqlite:db/cards.db');
$sql=$db->query('SELECT name FROM texts WHERE id IN ('.$id.')');
$name=$sql->fetchAll();
echo $name[0]["name"];
}
?>
