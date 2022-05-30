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
    <button onclick="delete_select()" class="btn btn-danger">Delete Select</button>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>
                    <div class="form-check">
                        <input class="form-check-input totalCheck" type="checkbox" value="" id="flexCheckDefault" name="all" onclick="check_all(this,'c')">
                    </div>
                </th>
                <th>
                    <i class="fa-solid fa-recycle"></i>
                </th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Mobile</th>
                <th scope="col">Birthday</th>
                <th scope="col">Address</th>
                <th>
                    <a style="color: #000;" href=""><i class="fa-solid fa-pen-nib"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input singleCheck" type="checkbox" value="<?= $r['sid'] ?>" id="singleSelect" name="c">
                        </div>
                    </td>
                    <td>
                        <?php
                        // confirm 確認的寫法
                        /*<a style="color: #888;" href="ab-delete.php?sid=<?=$r['sid']?>" onclick="return confirm('確定要刪除編號<?=$r['sid']?>的資料嗎?')"><i class="fa-solid fa-recycle"></i></a>
                        */ ?>
                        <a style="color: #888;" href="javascript:delete_it(<?= $r['sid'] ?>)"><i class="fa-solid fa-recycle"></i></a>
                    </td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= htmlentities($r['name']) ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= htmlentities($r['address']) ?></td>
                    <td>
                        <a style="color: #888;" href="ab-edit.php?sid=<?= $r['sid'] ?>"><i class="fa-solid fa-pen-nib"></i></a>
                    </td>
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
<script>
    function delete_it(sid) {
        if (confirm(`確定要刪除編號${sid}的資料嗎?`)) {
            location.href = `ab-delete.php?sid=${sid}`;
        }
    }
    // 全選checkbox同步設定
    function check_all(obj, cName) {
        const allCheck = document.getElementsByName(cName);
        for (let i = 0; i < allCheck.length; i++) {
            allCheck[i].checked = obj.checked;
        }
    }
    const singleSelect = document.querySelectorAll('#singleSelect');
    
    async function delete_select() {
        const select_ar = [];
        for (let i of singleSelect) {
            if (i.checked) {
                select_ar.push(i.value);
            }
        }
        console.log(select_ar);
        const r = await fetch('ab-delete-all.php', {
            method: 'GET',
        });
        const result = await r.json();

        console.log(result);
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>