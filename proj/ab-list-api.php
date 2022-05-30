<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-list';
$title = "資訊列表 - Nathan's practice";
//MV 資料處理 後端邏輯


// 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('Location: ab-list.php'); //轉向自己 或 給page=1 給值
    exit;
};
// 每一頁要幾筆
$perpage = 10;

// 取得總比數
$t_sql = "SELECT COUNT(1) FROM `address_book`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; // 拿出來是索引式陣列用法

// 取得總頁數
$totalPage = ceil($totalRows / $perpage);


$rows = []; // 給預設值 如果沒有資料 跑回圈用到 會出錯
if ($totalPage > 0) { //如果有資料 在執行if內的內容
    if ($page > $totalPage) {
        header("Location: ?page=$totalPage"); // 如果使用著輸入urlencoded > 總頁數,跳轉最後一頁
        exit;
    };
    $sql = sprintf("SELECT * FROM `address_book` LIMIT %s,%s", ($page - 1) * $perpage, $perpage);

    $rows = $pdo->query($sql)->fetchAll();
};

$output = [
    'perPage' => $perpage,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPage' => $totalPage,
    'rows' => $rows,
];

echo json_encode($output,JSON_UNESCAPED_UNICODE);


?>