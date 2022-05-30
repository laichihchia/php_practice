<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-add';
$title = "新增資料 - Nathan's practice";
?>

<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    .form-control.red {
        border: 1px solid red;
    }

    .form-text.red {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Add Form</h5>
                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">*name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="2"></textarea>
                            <div class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Submit
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add message</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body add-massage"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    // setting email & mobile regex
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    // 在 function 外先取得每個欄位的參照

    const name_f = document.form1.name;
    const email_f = document.form1.email;
    const mobile_f = document.form1.mobile;
    const addMassage = document.querySelector('.add-massage');
    // 迴圈較方便寫法
    const fields = [name_f, email_f, mobile_f];
    const fieldTexts = [];
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    };

    async function sendData() {
        // TODO 欄位檢查 前端的檢查
        // 填入正確格式回復原本顏色
        for (let i in fields) {
            fields[i].classList.remove('red');
            fieldTexts[i].innerText = '';
        }

        // 判斷 name 是否少於2個字 
        let isPass = true; // 預設為通過 最後由isPass決定function是否繼續執行
        if (name_f.value.length < 2) {
            fields[0].classList.add('red');
            fieldTexts[0].innerText = '* 姓名不得少於兩個字';
            // 另一種用法 Element.parentNode 找到上一層
            isPass = false;
        }
        // 判斷email 有輸入值 and 不符合email格式
        if (email_f.value && !email_re.test(email_f.value)) {
            fields[1].classList.add('red');
            fieldTexts[1].innerText = '* email格式錯誤';
            isPass = false;
        }
        // 判斷mobile 有輸入值 and 不符合mobile格式
        if (mobile_f.value && !mobile_re.test(mobile_f.value)) {
            fields[2].classList.add('red');
            fieldTexts[2].innerText = '* 手機格式錯誤';
            isPass = false;
        }
        // 如果沒通過 不繼續執行
        if (!isPass) {
            addMassage.innerHTML = '請輸入完整資訊 or 正確格式';
            return;
        }

        // 發送AJAX
        const fd = new FormData(document.form1);
        const r = await fetch('ab-add-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);

        if(result.success){
            addMassage.innerHTML = `<i class="fa-regular fa-thumbs-up"></i>${result.success},兩秒後跳回列表`
            setTimeout(() => {
                location.href = 'ab-list.php';
            }, 2000);
        }else{
            addMassage.innerHTML = result.error || '新增失敗';
            location.href = 'ab-add.php';
        }
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>