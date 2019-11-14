<?php
include_once "db_info.php";

$sql="SELECT * FROM `lottery` WHERE `year`='2019' && `month`='9,10'";
$tmp=$pdo->query($sql)->fetch();
echo empty($tmp);

?>