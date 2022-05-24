

<?php
// session storage 分頁關閉消失
// cookies session 瀏覽器關閉消失 


// set
setcookie('mycookie','10',time()+19);


// load
echo $_COOKIE['mycookie'];





?>