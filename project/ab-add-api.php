<?php
require __DIR__. '/parts/connect_db.php';

$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => "", 
];
// TODO 欄位檢查, 後端的檢查

$sql = "INSERT INTO `address_book`(
`name`, `email`, `mobile`,
`birthday`, `address`, `created_at`
) VALUES (
?,?,?,
?,?,NOW()
)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address'],
]);
if($stmt->rowCount()==1){
    $output['success'] = true;
}else{
    $output['error'] = '資料無法新增';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);