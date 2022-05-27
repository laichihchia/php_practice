<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-list';
$title = "資訊列表 - Nathan's practice";
// 用戶要看的頁數
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 20; //每一頁有幾筆
if ($page < 1) {
    header('Location: ?page=1');
    exit;
};

$t_sql = "SELECT COUNT(1) FROM `address_book`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; // 總共幾筆 索引式陣列 給索引拿到值

$totalPages = ceil($totalRows / $perPage); // 總共幾頁

$rows = [];
if ($totalRows > 0) {
    // 頁面超過總頁數
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages");
        exit;
    }

    $sql = sprintf("SELECT * FROM `address_book` ORDER BY sid ASC LIMIT %s,%s", ($page - 1) * $perPage, $perPage);

    $rows = $pdo->query($sql)->fetchAll();
}
$output =[
    'perPage' => $perPage,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows,
];

echo json_encode($output,JSON_UNESCAPED_UNICODE);
?>
