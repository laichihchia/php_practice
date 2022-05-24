<?php
require __DIR__. '/connect_db.php'; // 等於把整隻檔案拷貝進來
// include 功能跟 require一樣 require 較強烈


// 方法的多載 , 過載 overload 同一個method名稱 多種使用方式 依輸入參數判定
$stmt = $pdo -> query("SELECT * FROM address_book LIMIT 0,5"); // LIMIT index,取幾筆


// $row = $stmt -> fetch(); 取出為一筆資料 recordset第一筆
// $row = $stmt -> fetch(PDO::FETCH_NUM); 取出為索引式陣列



while($r = $stmt->fetch()){
    echo "{$r['name']}<br>" ;
}


// $rows = $stmt -> fetchAll(); // 取出recordset 所有資料
// echo json_encode($rows);



?>