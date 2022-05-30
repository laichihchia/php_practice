<?php
header('Content-Type: application/json');

$folder = __DIR__.'/uploaded/';

move_uploaded_file($_FILES['myfile']['tmp_name'],$folder.$_FILES['myfile']['name']);

echo json_encode($_FILES);

// $_FILES['myfile']
/* 單一檔案回傳的格式
{
    "myfile": {
        "name": "截圖 2022-05-23 下午7.41.17.png",
        "type": "image/png",
        "tmp_name": "/Applications/XAMPP/xamppfiles/temp/phpYtNGga",
        "error": 0,
        "size": 466855
    }
}
*/

/* 多個檔案回傳格式
{
    "myfile": {
        "name": [
            "截圖 2022-05-23 下午7.41.17.png",
            "截圖 2022-05-27 下午9.03.18.png"
        ],
        "type": [
            "image/png",
            "image/png"
        ],
        "tmp_name": [
            "/Applications/XAMPP/xamppfiles/temp/phpgfJxKf",
            "/Applications/XAMPP/xamppfiles/temp/phpFWbH84"
        ],
        "error": [
            0,
            0
        ],
        "size": [
            466855,
            110691
        ]
    }
}
*/
?>