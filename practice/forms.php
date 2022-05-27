<?php
$hobbies = [
    '3' => '游泳',
    '5' => '爬山',
    '6' => '畫圖',
    '9' => '慢跑',
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <form name="form1" onsubmit="sendData() ;return false;">
                    <div class="mb-3">
                        <label for="" class="form-label">嗜好1</label>
                        <!-- combobox -->
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="hobby1" data-multiple>
                            <option value="" selected disabled>-- 請選擇 --</option>
                            <?php foreach ($hobbies as $k => $v) : ?>
                                <option value="<?= $k ?>"><?= $v ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">嗜好2</label>
                        <?php foreach ($hobbies as $k => $v) : ?>
                            <div class="form-check">
                                <input class="form-check-input" name="hobby2" type="radio" name="flexRadioDefault" id="hobby2-<?= $k ?>" value="<?= $k ?>">
                                <label class="form-check-label" for="hobby2-<?= $k ?>">
                                    <?= $v ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">嗜好3</label>
                        <?php foreach ($hobbies as $k => $v) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobby3[]" value="<?= $k ?>" id="hobby3-<?= $k ?>">
                                <label class="form-check-label" for="hobby3-<?= $k ?>">
                                    <?= $v ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="test[]" value="hello">
                    <input type="hidden" name="test[]" value="哈囉">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        async function sendData(){
            const fd = new FormData(document.form1);
            const r = await fetch('forms-api.php',{
                method: 'POST',
                body : fd,
            })
            const result = await r.json();
            console.log(result);
        }
    </script>
</body>

</html>