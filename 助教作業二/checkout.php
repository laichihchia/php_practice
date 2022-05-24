<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="checkout">
        <div class='item gray'>
            <h4>商品</h4>
        </div>
        <div class='item gray'>
            <h4>價格</h4>
        </div>
        <div class='item gray'>
            <h4>數量</h4>
        </div>
        <?php
        $good = array("愛情", "友情", "教授", "系學會會長", "畢業證書", "學校");
        $price = array(100, 100, 100, 100, 100, 100);
        $num = $_POST["數量"];
        $detail = array($good, $price, $num);
        $total = 0;
        for ($i = 0; $i < 6; $i++) {
            if ($num[$i] != 0) {
                echo "<div class='item'>" . $good[$i] . "</div>" . "<div class='item'>$" . $price[$i] . "</div>" . "<div class='item'>" . $num[$i] . "</div>";
                $total += $num[$i] * $price[$i];
            }
        }
        ?>
    </div>
    <div class="footer">
        <?php
        echo "<div class='word'>總共 $" . $total . "元</div><br>";
        ?>
        <a href="index.php"><button type="submit">重新訂購</button></a>
    </div>
</body>
<style>
    .word {
        height: 30px;
        font-size: 22px;
        ;
    }

    .gray {
        background-color: #F0F0F0;
    }

    .checkout {
        display: flex;
        width: 70%;
        flex-direction: row;
        flex-wrap: wrap;
        background-color: white;
        margin: 20px 15%;
        border-top: 1px solid black;
    }

    .item {
        align-items: center;
        height: 40px;
        flex: 30%;
        display: flex;
        color: black;
        font-size: 17px;
        justify-content: center;
        border-bottom: 1px solid #9D9D9D;
    }

    .footer {
        width: 100%;

        text-align: center;
    }

    button {
        color: #84C1FF;
        font-size: 25px;
        background-color: white;
        border-radius: 5px;
        border: 2px #84C1FF solid;
    }

    button:hover {
        cursor: pointer;
        color: white;
        background-color: #84C1FF;
    }
</style>

</html>