<?php require __DIR__ . '/parts/connect_db.php';


// $sql = "INSERT INTO `address_book`(`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
//                         VALUES ('陳一鳴','123214@gmail.com','0921321333','1992-12-23','台北市',NOW())";

// $stmt = $pdo->query($sql);
// 避免 SQL injection (SQL 隱碼攻擊)


$sql = "INSERT INTO `address_book`(`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
                        VALUES (?,?,?,?,?,NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    '王一狗',
    '31243@gmail.com',
    '0921321122',
    '1989-12-10',
    '台北市',
]);


echo $stmt->rowCount();
