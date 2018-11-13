<?php

require_once('db.php');

$uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/image/nails/';
$uploadfile = $uploaddir . basename($_FILES['pictures']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['pictures']['tmp_name'], $uploadfile)) {
    $sql = "INSERT INTO nails (url,date) VALUES ('" . $_FILES['pictures']['name'] . "', '" . date('Y-m-d') . "');";
    $pdo->query($sql);
} else {
    echo 'Возможная атака с помощью файловой загрузки!\n';
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print '</pre>';

?>