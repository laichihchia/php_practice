<?php
$hash ='$2y$10$SDSDdbjfLubyorBlhW0Xm.cLdCOCz6PyxvP1Sopb5b3ZdPEHlid1y';
$password = isset($_GET['password']) ? $_GET['password'] : '';

if(password_verify($password,$hash)){
    echo 'pass';
}else{
    echo 'no pass';
}


?>