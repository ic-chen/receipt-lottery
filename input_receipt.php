<?php
include_once "db_info.php";

if(!empty($_POST['year']) || isset($_POST['month']) || isset($_POST['en']) || isset($_POST['num']) || isset($_POST['amount'])) {
    $year=$_POST['year'];
    $month=$_POST['month'];
    $month="$month";
    $en=$_POST['en'];
    $num=$_POST['num'];
    $amount=$_POST['amount'];
    // echo $year.$month.$en.$num.$amount;
    $sql="INSERT INTO `receipt`(`id`, `year`, `month`, `r_en`, `r_num`, `amount`) 
    VALUES (NULL, '$year','$month','$en','$num','$amount')";
    $pdo->exec($sql);
    // echo $sql;
    echo "輸入成功！";
} else {
    echo "未輸入成功。";
}
?>