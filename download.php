<?php
require 'vendor/autoload.php';

$parsedown = new Parsedown();

// POSTリクエストからパラメータを取得
$editorContent = $_POST['editorContent'];
$htmlString = $parsedown->text($editorContent);
$action = $_GET['action'];

if ($action == 'download') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="download.html"');
    echo $htmlString;
} else {
    header('Content-Type: text/html');
    echo $htmlString;
}