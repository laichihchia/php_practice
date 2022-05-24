<?php
session_start();

//  session_destroy(); 清除所有的session

// unset($_SESSION['user']); // 移除 user 對應的值

// // 轉向 , redirect
// header('Location: login2.php');


unset($_SESSION['user']);

header('Location: login_prac1.php');

?>