<?php
header('Content-Type: application/json');

$folder = __DIR__.'/uploaded/';

// filter file and 決定附檔名
$extMap = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/git' => '.gif',
];

$output = [
    'success' => false,
    'filename' => '',
    'error' => '',
];

if(empty($extMap[$_FILES['avatar']['type']])){
    $output['error'] = '檔案類型錯誤';
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit;
}
$ext = $extMap[$_FILES['avatar']['type']];

$filename =md5($_FILES['avatar']['type'].rand()).$ext;

$output['filename'] = $filename;

if(move_uploaded_file($_FILES['avatar']['tmp_name'],$folder.$filename)){
    $output['success'] = true;
}else{
    $output['error'] = 'move fail';
}

echo json_encode($output);