<div>
<?php require __DIR__ . '/parts/connect_db.php';
// exit;//關閉功能
echo microtime(true)."<br>";

$lname = ['陳', '林', '李', '王', '吳'];
$fname = ['小明', '大明', '一凡', '二狗', '一旦'];


$sql = "INSERT INTO `address_book`(`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
                        VALUES (?,?,?,?,?,NOW())";
$stmt = $pdo->prepare($sql);


for ($i = 0; $i < 100; $i++) {
    shuffle($lname);
    shuffle($fname);
    $ts = rand(strtotime('1989-01-01'),strtotime('2000-01-01'));

    $stmt->execute([
        $lname[0].$fname[0],
        "m31{$i}243@gmail.com",
        '0921'.rand(100000,999999),
        date('Y-m-d',$ts),
        '台北市',
    ]);
}

echo microtime(true)."<br>";
?>
</div>