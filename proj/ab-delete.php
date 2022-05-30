<?php require __DIR__ . '/parts/connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

if(!empty($sid)){
    $pdo->query("DELETE FROM `address_book` WHERE `sid` = $sid");
}


$come_from = 'ab-list.php';
if(!empty($_SERVER['HTTP_REFERER'])){
    $come_from = $_SERVER['HTTP_REFERER'];
}


// 刪除完成 跳轉回列表
header("Location: $come_from");
?>