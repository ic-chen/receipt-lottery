<?php
include_once "db_info.php";

$year=date("Y");

function showList($m) {
    global $pdo;
    $year=date("Y");
    $sql="SELECT * FROM `lottery` WHERE `year`='$year' && `month`='$m'";
    // echo $sql;
    $data=$pdo->query($sql)->fetch();
    return $data;
}
if(isset($_POST['submit'])) {
    $month=["1~2月", "3~4月", "5~6月", "7~8月", "9~10月", "11~12月"];
    if($_POST['submit']==$month[0]) {
        $prizeNum=showList("1,2");
    }
    if($_POST['submit']==$month[1]) {
        $prizeNum=showList("3,4");
    }
    if($_POST['submit']==$month[2]) {
        $prizeNum=showList("5,6");
    }
    if($_POST['submit']==$month[3]) {
        $prizeNum=showList("7,8");
    }
    if($_POST['submit']==$month[4]) {
        $prizeNum=showList("9,10");
    }
    if($_POST['submit']==$month[5]) {
        $prizeNum=showList("11,12");
    }
} else {
    $_POST['submit']="0月";
    $prizeNum=["暫無資料", "暫無資料", "暫無資料", "暫無資料", "暫無資料", "暫無資料", "暫無資料", "暫無資料", "暫無資料", "暫無資料", "暫無資料"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel=stylesheet type="text/css" href="./css/main.css">
</head>
<style>
table tr:nth-child(1) {
        height: 10%;
    }
table tr:nth-child(1) td {
        width: 16.6%;
    }
input[type="submit" i] {
        font-size: 2.5vw;
        width: 80%;
        height: 60%;
        padding: 1px 1px;
    }
</style>
<body>
<form action="receipt_lottery.php" method="post">
    <table>
        <tr>
            <td><input type="submit" name="submit" value="1~2月"></td>
            <td><input type="submit" name="submit" value="3~4月"></td>
            <td><input type="submit" name="submit" value="5~6月"></td>
            <td><input type="submit" name="submit" value="7~8月"></td>
            <td><input type="submit" name="submit" value="9~10月"></td>
            <td><input type="submit" name="submit" value="11~12月"></td>
        </tr>
        <tr>
            <td colspan="2"><?=$year;?>年</td>
            <td colspan="2"><?=$_POST['submit'];?></td>
            <td colspan="2">
                <input type="button" name="button" value="對獎" onclick="location.href='lottery.php?year=<?=$year;?>&month=<?=$prizeNum[2];?>'">
            </td>
        </tr>
        <tr>
            <td>特別獎</td>
            <td colspan="4">
                <?=$prizeNum[3];?>
            </td>
            <td>1000萬</td>
        </tr>
        <tr>
            <td>特獎</td>
            <td colspan="4">
                <?=$prizeNum[4];?>
            </td>
            <td>200萬</td>
        </tr>
        <tr>
            <td>頭獎</td>
            <td colspan="4">
                <?=$prizeNum[5]."<br>";?><?=$prizeNum[6]."<br>";?><?=$prizeNum[7];?>
            </td>
            <td>20萬</td>
        </tr>
        <tr>
            <td>二獎</td>
            <td colspan="4">末7位數號碼與頭獎末7位數相同</td>
            <td>4萬元</td>
        </tr>
        <tr>
            <td>三獎</td>
            <td colspan="4">末6位數號碼與頭獎末6位數相同</td>
            <td>1萬元</td>
        </tr>
        <tr>
            <td>四獎</td>
            <td colspan="4">末5位數號碼與頭獎末5位數相同</td>
            <td>4千元</td>
        </tr>
        <tr>
            <td>五獎</td>
            <td colspan="4">末4位數號碼與頭獎末4位數相同</td>
            <td>1千元</td>
        </tr>
        <tr>
            <td>六獎</td>
            <td colspan="4">末3位數號碼與頭獎末3位數相同</td>
            <td>2百元</td>
        </tr>
        <tr>
            <td>增開</td>
            <td colspan="4">
                <?=$prizeNum[8]."<br>";?><?=$prizeNum[9]."<br>";?><?=$prizeNum[10];?>
            </td>
            <td>2百元</td>
        </tr>
    </table>
</form>
</body>
</html>