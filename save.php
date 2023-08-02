<?php

$content = $_POST['jsontable'];
$filename = $_POST['filename'];

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');     
header("Content-disposition: attachment; filename=$filename");
echo $content;
exit;

?>