<?php
session_start(); // 要放在 HTML 內容出現之前
// 為了要設定cookie

if(!isset($_SESSION['a'])){
    $_SESSION['a'] = 0;
}
$_SESSION['a']++;

echo $_SESSION['a'];

?>

