<?php
$filename = 'test.txt';

function block($filename) {
    do {
        $fs = fopen($filename, 'a+');
        if($fs) {
            flock($fs, LOCK_EX);
            return $fs;
        } else {
            sleep(1);
        }
    } while(!$fs);
}

function unblock($fs) {
    flock($fs, LOCK_UN);
    fclose($fs);
}

function summ($fs) {
    global $filename;
    $str = explode(PHP_EOL, fread($fs,filesize($filename)));
    $n = 0;
    foreach($str as $num) {
        $n += intval($num);
    }
    fwrite($fs,$n.PHP_EOL);
}

echo("Блокируем файл...".PHP_EOL);
$fs = block($filename);
echo("Файл заблокирован! Ожидайте...".PHP_EOL);
sleep(5) and summ($fs) and unblock($fs);
echo("Файл разблокирован и доступен!".PHP_EOL);
?>
