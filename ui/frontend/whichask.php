<?php
$file = file("which.txt");
for ($i = max(0, count($file)-1); $i < count($file); $i++) {
echo $file[$i];
}


