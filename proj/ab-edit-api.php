<?php require __DIR__ . '/parts/connect_db.php';

// 改為json for postman 測試用
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'status_code' => 0,
    'error' => '',
];

$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;


// TODO 欄位檢查 後端的檢查 必填欄位的檢查做法--begin
// 姓名欄位為空值 輸出錯誤資訊
if(empty($sid) or empty($_POST['name'])){
    $output['error'] = '姓名為必填欄位';
    $output['status_code'] = 400;
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit; 
};

$name = $_POST['name'];
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$birthday = empty($_POST['birthday']) ? NULL : $_POST['birthday'];// birth 允許為空值
$address = $_POST['address'] ?? '';

// 判斷是為 email 非空值(有輸入) 且 不符合 email 格式 輸出錯誤資訊
if(!empty($email) and filter_var($email,FILTER_VALIDATE_EMAIL)===false){
    $output['error'] = 'Email格式錯誤';
    $output['status_code'] = 405;
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit;
}

// 判斷是為 mobile 非空值(有輸入) 且 不符合 mobile 格式 輸出錯誤資訊
if(!empty($mobile) and preg_match("/^09\d{2}-?\d{3}-?\d{3}$/", $mobile)===0){
    $output['error'] = '手機格式錯誤';
    $output['status_code'] = 410;
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit;
}

// TODO 欄位檢查 後端的檢查 必填欄位的檢查做法--end

$sql = "UPDATE `address_book` 
SET `name`=?,
    `email`=?,
    `mobile`=?,
    `birthday`=?,
    `address`=? 
    WHERE `sid` = $sid";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $name,
    $email,
    $mobile,
    $birthday,
    $address,
]);

if($stmt->rowCount()==1){
    $output['success'] = true;
}else{
    $output['error'] = 'Edit failed.';
};


echo json_encode($output,JSON_UNESCAPED_UNICODE)

?>