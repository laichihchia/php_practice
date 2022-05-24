<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>


    <table>
        <?php for ($i = 0; $i < 16; $i++) { ?>
            <tr>
                <?php for ($j = 0; $j < 16; $j++) { ?>
                    <td style="background-color:<?= sprintf("#%s%s00%s%s",$i,$i,$j,$j) ?>"></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

</body>

</html>