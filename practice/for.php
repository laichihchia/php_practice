<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <?php
    for ($i = 0; $i < 10; $i++) {
        echo $i . "<br>";
        // echo "$i<br>";
        // echo "<div>$i</div>"";
    }
    $var = 66;
    $c = "abc";
    // echo $var + $c; // warning
    ?> -->
    <h1>99乘法表</h1>
    <table border="1">
        <?php for ($i = 1; $i < 10; $i++) { ?>
            <tr>
                <?php for ($j = 1; $j < 10; $j++) { ?>
                    <?php printf("<td> %s * %s = %s </td>",$i,$j,$i*$j) ?>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>