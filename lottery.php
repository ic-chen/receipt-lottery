<link type="text/css" rel="Stylesheet" href="./css/main.css" />
<style>
    body {
        text-align: center;
        padding: 3%;
    }
</style>
<?php
include_once "db_info.php";

$year=$_GET['year'];
$month=$_GET['month'];

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

// 頭獎
$sqlOther="SELECT `first1`, `first2`, `first3` 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$one=$pdo->query($sqlOther)->fetch();

// 特獎
$sqlOther="SELECT `grand` 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$grand=$pdo->query($sqlOther)->fetch();

// 特別獎
$sqlOther="SELECT `special` 
FROM `lottery` WHERE `year`='$year' && `month`='$month'";
$special=$pdo->query($sqlOther)->fetch();

// 所有發票資料
$sqlRecpt="SELECT `r_num`, `amount`, substring(`r_num`,2,7), substring(`r_num`,3,6), substring(`r_num`,4,5), substring(`r_num`,5,4), substring(`r_num`,6,3) 
FROM `receipt` WHERE `year`='$year' && `month`='$month'";
$data=$pdo->query($sqlRecpt)->fetchAll();
?>

中獎編號如下：<br><br>

<?php
$index = 0;
foreach($data as $value) {
    if(in_array($value[0],$special)) {
        echo "特別獎：".$value[0]." | 獎金：1000萬元<br>";
    } elseif(in_array($value[0],$grand)) {
        echo "特獎：".$value[0]." | 獎金：200萬元<br>";
    } elseif(in_array($value[0],$one)) {
        echo "頭獎：".$value[0]." | 獎金：20萬元<br>";
    } elseif(in_array($value[2],$two)) {
        echo "二獎：".$value[0]." | 獎金：4萬元<br>";
    } elseif(in_array($value[3],$three)) {
        echo "三獎：".$value[0]." | 獎金：1萬元<br>";
    } elseif(in_array($value[4],$four)) {
        echo "四獎：".$value[0]." | 獎金：4千元<br>";
    } elseif(in_array($value[5],$five)) {
        echo "五獎：".$value[0]." | 獎金：1千元<br>";
    } elseif(in_array($value[6],$six)) {
        echo "六獎：".$value[0]." | 獎金：200元<br>";
    } else {
        $index++;
    }
}

if(count($data)==$index) {
    echo "沒有中獎...請再接再厲！";
} else {
    echo "<br><br>恭喜中獎！發大財！";
}
?>