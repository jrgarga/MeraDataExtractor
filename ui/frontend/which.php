<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$albumname = $_POST['album'];
$fh = fopen("which.txt", 'w');
fwrite($fh,$_POST['album']);
//fwrite($fh,'3');

fclose($fh);
?>
