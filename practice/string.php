<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $name ='Victor';
    echo "hello,$name <br>"; // hello,Victor
    echo "hello,{$name}123 <br>"; // hello, Victor123
    echo "hello,${name}123 <br>"; // hello, Victor123
    echo "hello,\$name <br>"; // hello, $name
    echo "hello,$name <br>"; // hello,Victor
    ?>
</body>
</html>