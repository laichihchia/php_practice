<?php
require __DIR__ . '/connect_db.php';


$stmt = $pdo->query("SELECT * FROM `address_book` ORDER BY `address_book`.`sid` ASC LIMIT 0,5");

// $rows = $stmt->fetch(PDO::FETCH_NUM);
// $rows = $stmt->fetchAll();

// echo json_encode($rows);

while($r = $stmt ->fetch()){
    echo $r['name'];
}


?>