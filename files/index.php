<html>
<head>
</head>
<body>

<a href=../ui/>back to map</a>
<P>List of files:</p>
<UL>
<P>


<?php


function scan_dir($dir) {
    $ignored = array('.', '..', '.svn', '.htaccess');

    $files = array();    
    foreach (scandir($dir) as $file) {
        if (in_array($file, $ignored) || strtolower(substr($file, strrpos($file, '.') + 1)) != 'csv') continue;
        $files[$file] = filemtime($dir . '/' . $file);
    }


    $files = array_keys($files);
    //arsort($files);

array_multisort(array_map( 'filemtime', $files ),SORT_NUMERIC,SORT_DESC,$files);


    return ($files) ? $files : false;
}

$dir    = './';
$filesZort = scan_dir($dir);

  foreach($filesZort as $source)
{
  	//echo '<li><a href="'.$source.'">'.$source.'</a></li>';
  	echo '<li><a href="'.$source.'">'.$source.'</a> </br>Last Modified: '.date('F d Y, H:i:s',filemtime($source)).'</li></br>';
  	//echo '<li><a href="'.$source.'">'.$source.'</a> Last Modified: '.date('F d Y, H:i:s',filemtime($source)).'</li>';
}

?>


</p>
</UL>


</body></html>

