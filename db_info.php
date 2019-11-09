<?php
$dsn="mysql:host=localhost;dbname=receipt_lot;charset=utf8";
$pdo=new PDO($dsn,"root","");

function insertRcpt() {
    $sql="INSERT INTO `receipt`(`year`, `month`, `r_en`, `r_num`, `amount`) 
    VALUES ($year,$month,$r_en,$r_num,$amount)";
    $pdo->exec($sql);
}

function insertLot() {
    $sql="INSERT INTO `lottery`(`year`, `month`, `special`, `grand`, `first1`, `first2`, `first3`, `extra1`, `extra2`, `extra3`) 
    VALUES ($year,$month,$special,$grand,$first1,$first2,$first3,$extra1,$extra2,$extra3)";
    $pdo->exec($sql);
}
?>