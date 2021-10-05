<?php


$file = file("./frontend_helpers/output_onepoint.txt");
for ($i = max(0, count($file)-1); $i < count($file); $i++) {

//echo $file[$i] . "</br>";
$test=split2($file[$i],',',4);
//echo $test[0] . "</br>";
//echo $test[1] . "</br>";
////echo substr($test[1],0,2) . "</br>";
//echo substr($test[1], 0, 2) . "</br>";
$day=(int)substr($test[1],0,2);
//echo $day . "</br>";
//$percent=(($day*100)/31);
//echo $percent . "</br>";
//echo $test . "</br>";

$s = $test[1];
$s1 = substr($s,strpos($s,"-",0)+1);
$s2 = substr($s1,0,strpos($s1,"-",0));
$mint = (int)$s2;

//echo $s2 . "</br>";

if ($mint==1 or $mint==3 or $mint==5 or $mint==7 or $mint==8)
{
$percent=(($day*100)/31);
}
else if ($mint==2)
{
$percent=(($day*100)/28);
}
else
{
$percent=(($day*100)/30);
}
}


function split2($string,$needle,$nth){
$max = strlen($string);
$n = 0;
for($i=0;$i<$max;$i++){
    if($string[$i]==$needle){
        $n++;
        if($n>=$nth){
            break;
        }
    }
}
$arr[] = substr($string,0,$i);
$arr[] = substr($string,$i+1,$max);

return $arr;
}


//$percent = 100;

if ($percent==null)
{
$percent=-1;
//echo '<font size=3 color=red><b>'.$percent.'% starting...</b></font></br>';
echo $percent;
}
else if ($percent<=1)
{
$percent=0;
//echo '<font size=3 color=red><b>'.$percent.'% starting...</b></font></br>';
echo $percent;
}
else if ($percent>=100)
{
//echo '<font size=3 color=green><b>'.$percent.'%[finished]</b></font></br>';
echo $percent;
}
else
{
//echo '<font size=3 color=blue'.$percent.'</font></br>';
echo $percent;
}
?>


