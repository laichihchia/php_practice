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
                <?php for ($j = 0; $j < 16; $j++) { 
                    $r = rand(150,255);
                    $g = rand(150,255);
                    $b = rand(150,255);
                    
                    ?>
                    <td style="background-color:<?= sprintf("#%'02X%'02X%'02X",$r,$g,$b) ?>"></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

</body>

</html>