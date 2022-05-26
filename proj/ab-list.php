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


?>

<?php //C 呈現
include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">E-mail</th>
                <th scope="col">Birthday</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= $r['address'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=1"><i class="fa-solid fa-angles-left"></i></a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>"><i class="fa-solid fa-angle-left"></i></a>
                    </li>
                    <?php for ($i = $page; $i <= $page + 3; $i++) :
                        if ($i >= 1 and $i <= $totalPage) : ?>
                            <li class="page-item <?= $page == $i ? 'active' : ''; ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif;
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPage ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>"><i class="fa-solid fa-angle-right"></i></a>
                    </li>
                    <li class="page-item <?= $page == $totalPage ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $totalPage ?>"><i class="fa-solid fa-angles-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<?php include __DIR__ . '/parts/html-foot.php'; ?>