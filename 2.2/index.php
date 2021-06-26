<?php

$word = $_POST['word'];
$c1 = strlen($word) + 1;

$connection = mysqli_connect('localhost','test','12345','seologic_test');
if ($connection == false) {
    exit();
}
$db_create = mysqli_query($connection, "CREATE TABLE words (
   id int(5) NOT NULL AUTO_INCREMENT,
   word varchar(200) DEFAULT NULL,
   PRIMARY KEY(id));");
$add_to_table = mysqli_query($connection, "INSERT INTO words(word)
VALUES ('баннер'), ('баннеры'), ('баннера'), ('баннеру'), ('баннерчик'), ('баннерный'), ('газ'), ('газета'), ('газированный');");

function getwordsdb() {
    global $connection;
    $get_words = mysqli_query($connection, "SELECT word FROM words; ");
    $word_array = array();
    while (($r1 = mysqli_fetch_assoc($get_words))) {
        $word_array[] = $r1['word'];
    }
    return $word_array;
}

if ((strpos($word, '*') !== false)) {
        $word = str_replace("*", "", $word);
        $rword_array = array();
        $wordsdb = getwordsdb();
        foreach ($wordsdb as $words_db) {
            if ((strpos($words_db, $word) !== false)) {
                $ok = str_replace($word, "", $words_db);
                $word_new = $word and $word_new .= $ok;
                $rword_array[] = $word_new;

            }

        }
} else if ((strpos($word, '?') !== false)) {
    $word = str_replace("?", "", $word);
    $rword_array = array();
    $wordsdb = getwordsdb();
    foreach ($wordsdb as $words_db) {
        if ((strpos($words_db, $word) !== false) and ($c1 == strlen($words_db)))  {
            $rword_array[] = $words_db;

        }
    }
}
$drop_table = mysqli_query($connection,"drop table words;");
mysqli_close($connection);

require_once('tpl.tpl');



