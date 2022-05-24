<?php
session_start();

$users = [
    'Andy' => [
        'password' => '1111',
        'nickname' => '安迪',
    ],
    'Bob' => [
        'password' => '2222',
        'nickname' => '鮑伯',
    ]
];

$output = [
    'postData' => $_POST,
];

if (isset($_POST['account'])) {
    // echo json_encode($_POST);
    // exit; // 立刻停止程式
    if (!empty($_POST['account']) and !empty($_POST['password'])) {

        if (!empty($users[$_POST['account']])) { //對應帳號

            if ($_POST['password'] === $users[$_POST['account']]['password']) {
                $output['msg'] = '登入成功';
                echo json_encode($output);
                exit;
                // 登入成功
            } else {
                $output['msg'] = '帳號對,密碼錯';
                echo json_encode($output);
                exit;
                // 帳號對,密碼錯
            }
        } else {
            $output['msg'] = '帳號錯誤';
            echo json_encode($output);
            exit;
            //帳號錯誤
        }
    } else {
        //其中有一欄沒有值
        $output['msg'] = '請輸入完整資訊';
        echo json_encode($output);
        exit;
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="account" placeholder="帳號">
        <br>
        <input type="password" name="password" placeholder="密碼">
        <br>
        <button>login</button>
    </form>
</body>

</html>