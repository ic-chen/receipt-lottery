<link rel=stylesheet type="text/css" href="./css/main.css">
<style>
    body {
        text-align: center;
        padding: 3%;
    }
</style>
<?php
include_once "db_info.php";

if(!empty($_POST['year']) && isset($_POST['month']) && isset($_POST['special']) && isset($_POST['grand']) && isset($_POST['first1']) && isset($_POST['first2']) && isset($_POST['first3']) || isset($_POST['extra1']) || isset($_POST['extra2']) || isset($_POST['extra3'])) {
    $year=$_POST['year'];
    $month=$_POST['month'];
    $month="$month";
    $special=$_POST['special'];
    $grand=$_POST['grand'];
    $first1=$_POST['first1'];
    $first2=$_POST['first2'];
    $first3=$_POST['first3'];
    $extra1=$_POST['extra1'];
    $extra2=$_POST['extra2'];
    $extra3=$_POST['extra3'];

    if(strlen($special)==8 && strlen($grand)==8 && strlen($first1)==8 && strlen($first2)==8 && strlen($first3)==8) {
        $sql="INSERT INTO `lottery`(`year`, `month`, `special`, `grand`, `first1`, `first2`, `first3`, `extra1`, `extra2`, `extra3`) 
        VALUES ('$year','$month','$special','$grand','$first1','$first2','$first3','$extra1','$extra2','$extra3')";

        $pdo->exec($sql);
        echo "輸入成功！";
    } else {
        echo "獎號不是8位數，請重新輸入。";
    }
} else {
    echo "未輸入成功。";
}
?>