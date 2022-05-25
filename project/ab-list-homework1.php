<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-list';
$title = '通訊錄列表';
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

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<div class="container">

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col"><a href=""><i class="fa-solid fa-trash-can"></i></a></th>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">手機</th>
                <th scope="col">電郵</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
                <th scope="col"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><a href="javascript:" onclick="trashCanClick(event);return false"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= $r['address'] ?></td>
                    <th scope="col"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></th>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=1">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                    ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/script.php' ?>
<script>
function trashCanClick(event){
    // console.log(event.currentTarget);
    const a_tag = event.currentTarget;
    const tr = a_tag.closest('tr');
    console.log(tr);
    tr.remove();
}
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>