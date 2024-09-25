<?php
// POSTリクエストからパラメータを取得
$editorContent = $_POST['editorContent'];
$action = $_GET['action'];

if ($action == 'download') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="download.md"');
    echo $editorContent;
}