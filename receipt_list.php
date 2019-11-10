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
    table tr:nth-child(3) td {
        font-size: 3.5vw;
    }

    table tr:not(:nth-child(3)) {
        height: 10vw;
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
<form action="receipt_list.php" method="post">
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
            <td colspan="4">發票號碼</td>
            <td colspan="2">金額</td>
        </tr>
        <tr>
            <td colspan="4">
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
}
function showList($m) {
    global $pdo;
    $year=date("Y");

    $sqlCount="SELECT COUNT(*) FROM `receipt` WHERE `year`='$year' && `month`='$m'";
    $count=$pdo->query($sqlCount)->fetch();

    $sqlTotal="SELECT SUM(`amount`) FROM `receipt` WHERE `year`='$year' && `month`='$m'";
    $total=$pdo->query($sqlTotal)->fetch();

    $sql="SELECT * FROM `receipt` WHERE `year`='$year' && `month`='$m'";
    $data=$pdo->query($sql)->fetchAll();
    foreach($data as $value) {
        $num=$value[3].$value[4]."<br>";
?>
            <?=$num;?>
<?php
    }
?>
            </td>
            <td colspan="2">
<?php
    foreach($data as $value) {
        $amt=$value[5]."<br>";
?>
            <?=$amt;?>
<?php
    }
?>
            </td>
        </tr>
        <tr>
            <td colspan="4">總共<?=$count[0];?>張發票</td>
            <td colspan="2">總計<?=$total[0];?>元</td>
<?php
}
?>
        </tr>
    </table>
</form>
</body>
</html>