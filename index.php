<?php
include 'core.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_ = new Core($_POST['number']);
    print json_encode($_->start(), JSON_PRETTY_PRINT);
}else print file_get_contents("page.html");