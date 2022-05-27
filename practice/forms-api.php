<?php

$output = [
    'postData' => $_POST,
];

$json = json_encode($output,JSON_UNESCAPED_UNICODE);

file_put_contents('./forms-api.json',$json);

echo $json;

?>