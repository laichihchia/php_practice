<?php
session_start();
$users = [
    'Andy' => [
        'password' => '0000',
        'nickname' => '安迪',
    ],
    'Bob' => [
        'password' => '1111',
        'nickname' => '鮑伯',
    ],
];

$output = [
    'postData' => $_POST,
];
if (isset($_POST['account'])) {
    // var_dump($_POST);
    // echo json_encode($_POST);
    // exit;
    if (!empty($_POST['account']) and !empty($_POST['password'])) {

        if (!empty($users[$_POST['account']])) {

            if ($_POST['password'] === $users[$_POST['account']]['password']) {
                // 登入成功
                // 資料設定到session
                $_SESSION['user'] = [
                    'account' => $_POST['account'],
                    'nickname' => $users[$_POST['account']]['nickname'],
                ];
            }
        }
    }
    if (!isset($_SESSION['user'])) {
        $error_msg = '帳號或密碼錯誤';
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
    <?php if (isset($_SESSION['user'])) : ?>
        <h2><?= $_SESSION['user']['nickname'] ?>,您好</h2>
        <p><a href="./logout.php">登出</a></p>
    <?php else : ?>
        <?php if (isset($error_msg)) : ?>
            <h2 style="color: red;"><?= $error_msg ?></h2>
        <?php endif; ?>
        <form action="" method="post">
            <input type="text" name="account" placeholder="帳號" value="<?= isset($_POST['account']) ? htmlentities($_POST['account']):'' ?>">
            <br>
            <input type="password" name="password" placeholder="密碼">
            <br>
            <button>Login</button>
        </form>
    <?php endif; ?>


</body>

</html>