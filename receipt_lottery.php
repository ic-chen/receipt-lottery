<?php
$year=date("Y");

if(isset($_POST['submit'])) {
    $mon=$_POST['submit'];
} else {
    $mon="0月";
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
            <td colspan="2"><?=$mon;?></td>
<?php
include_once "db_info.php";

if(isset($_POST['submit'])) {
    $month=["1~2月", "3~4月", "5~6月", "7~8月", "9~10月", "11~12月"];
    if($_POST['submit']==$month[0]) {
        showList("1,2");
    }
    if($_POST['submit']==$month[1]) {
        showList("3,4");
    }
    if($_POST['submit']==$month[2]) {
        showList("5,6");
    }
    if($_POST['submit']==$month[3]) {
        showList("7,8");
    }
    if($_POST['submit']==$month[4]) {
        showList("9,10");
    }
    if($_POST['submit']==$month[5]) {
        showList("11,12");
    }
} else {
    $_POST['submit']="0月";
}
function showList($m) {
    global $pdo;
    $year=date("Y");
    $sql="SELECT * FROM `lottery` WHERE `year`='$year' && `month`='$m'";
    // echo $sql;
    $data=$pdo->query($sql)->fetch();
?>
            <td colspan="2">
                <input type="button" name="button" value="對獎" onclick="location.href='lottery.php?year=<?=$year;?>&month=<?=$m;?>'">
            </td>
        </tr>
        <tr>
            <td>特別獎</td>
            <td colspan="4">
                <?=$data['special'];?>
            </td>
            <td>1000萬</td>
        </tr>
        <tr>
            <td>特獎</td>
            <td colspan="4">
                <?=$data['grand'];?>
            </td>
            <td>200萬</td>
        </tr>
        <tr>
            <td>頭獎</td>
            <td colspan="4">
                <?=$data['first1']."<br>";?><?=$data['first2']."<br>";?><?=$data['first3'];?>
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
                <?=$data['extra1']."<br>";?><?=$data['extra2']."<br>";?><?=$data['extra3'];?>
            </td>
            <td>2百元</td>
        </tr>
<?php
}
?>
    </table>
</form>
</body>
</html>