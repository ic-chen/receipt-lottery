<?php
include_once "db_info.php";

$year=$_GET['year'];
$month=$_GET['month'];

// 所有發票
$sqlRecpt="SELECT `r_num`, substring(`r_num`,6,3) FROM `receipt` WHERE `year`='$year' && `month`='$month'";
$data=$pdo->query($sqlRecpt)->fetchAll();

// 六獎
$sql3num="SELECT substring(`first1`,6,3), substring(`first2`,6,3), substring(`first3`,6,3), `extra1`, `extra2`, `extra3` 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$six=$pdo->query($sql3num)->fetch();

// 五獎
$sql4num="SELECT substring(`first1`,5,4), substring(`first2`,5,4), substring(`first3`,5,4) 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$five=$pdo->query($sql4num)->fetch();

// 四獎
$sql5num="SELECT substring(`first1`,4,5), substring(`first2`,4,5), substring(`first3`,4,5) 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$four=$pdo->query($sql5num)->fetch();

// 三獎
$sql6num="SELECT substring(`first1`,3,6), substring(`first2`,3,6), substring(`first3`,3,6) 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$three=$pdo->query($sql6num)->fetch();

// 二獎
$sql7num="SELECT substring(`first1`,2,7), substring(`first2`,2,3), substring(`first3`,2,7) 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$two=$pdo->query($sql7num)->fetch();

// 頭獎、特獎、特別獎
$sqlOther="SELECT `first1`, `first2`, `first3`, `grand`, `special` 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$one=$pdo->query($sqlOther)->fetch();

foreach($data as $value) {
    if(in_array($value[1],$six)) {
        echo "六獎：".$value[0];
    }
}
?>