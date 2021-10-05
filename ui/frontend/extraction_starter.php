<html>
<head>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<style>
.button {
    background-color: #ddcccc;
    border: 1px solid black;
    color: black;
    font-family: Arial;
    font-size: big;
    text-decoration: none;
    padding: 3px;
}

#wrapper {
  text-align:center;
  border:1px solid #7F7F7F;
  width:250px;
  margin:25px auto;
  padding:25px;
  background-color:#E3E4E4;
}

#myTimer {
  font:64px Tahoma bold;
  padding:20px;
  display:block;
}

button {
  width:225px;
  padding:10px;
}

.btnEnable {
  background-color:#E6F9D2;
  border:1px solid #97DE4C;
  color:#232323;
  cursor:pointer;
}

.btnDisable {
  background-color:#FCBABA;
  border:1px solid #DD3939;
  color:#232323;
  cursor:wait;
}

#wrapper2 {
  text-align:center;
  border:1px solid #7F7F7F;
  width:250px;
  margin:25px auto;
  padding:25px;
  background-color:#E3E4E4;
}
#myTimer2 {
  font:64px Tahoma bold;
  padding:20px;
  display:block;
}

button2 {
  width:225px;
  padding:10px;
}

.btnEnable2 {
  background-color:#E6F9D2;
  border:1px solid #97DE4C;
  color:#232323;
  cursor:pointer;
}

.btnDisable2 {
  background-color:#FCBABA;
  border:1px solid #DD3939;
  color:#232323;
  cursor:wait;
}

#wrapper3 {
  text-align:center;
  border:1px solid #7F7F7F;
//  width:685px;
  width:460px;
  margin:25px auto;
  padding:25px;
  background-color:#E3E4E4;
}

#myTimer3 {
  font:64px Tahoma bold;
  padding:20px;
  display:block;
}

button3 {
  width:225px;
  padding:10px;
}

.btnEnable3 {
  background-color:#E6F9D2;
  border:1px solid #97DE4C;
  color:#232323;
  cursor:pointer;
}
.btnDisable3 {
  background-color:#FCBABA;
  border:1px solid #DD3939;
  color:#232323;
  cursor:wait;
}


</style>


</head>
<body>


<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$error=0;

  if(isset($_POST['submit']))
  {
$markerstest = json_decode($_POST['markers'],true);
  }
else
{
  echo "<center><font color=red> No submit. error:0</font></center>";
$error=$error+1;
}

//$markerstest = json_decode($_POST['markers'],true);
if (empty($_POST['Year']) or empty($_POST['Month']) or empty($_POST['Type']) or sizeof($markerstest) == 0)
{
  echo "<center><font color=red> All fields are required. error:1</font></center>";
  $error=$error+1;

}
else if ($_POST['Year']=='Year' or $_POST['Month']=='Month' or $_POST['Type']=='Type')
{
  echo "<center><font color=red> All fields are required. error:2</font></center>";
  $error=$error+1;
}
else {
//echo $_POST['Year'].'</br>';
//echo $_POST['Month'].'</br>';
//echo $_POST['Type'].'</br>';
//echo $_POST['markers'].'</br>';

//  echo "<center><font color=green> Proceed...1</font></center>";
//  echo "<center><font color=green> Proceed...2</font></center>";
$levent='gorgu';
}

$yenicmd='ps aux | grep \'WEBSERVER\' | grep -v grep| awk \'{print $2}\' ';
$yenicommand = shell_exec($yenicmd);

if ($yenicommand!=NULL)
{
$able=0;
}
else
{
$able=1;
}

if ( $able ==0)
{

  echo '<center><font color=red> There is an ongoing extraction...error:3</font></center>';
  $error=$error+1;
}
else
{
//  echo "<center><font color=green> Proceed...3</font></center>";
//  echo "Proceed...3";
$levent='simge';
}

if($error==0)
{
$year = $_POST['Year'];
$type = $_POST['Type'];
$month = $_POST['Month'];



$markers = json_decode($_POST['markers'],true);
$teststring = join(",",$markers);
$teststring2 = join(" ",$markers);
//echo $markers.'</br>';
//echo $teststring.'</br>';
//echo $teststring2.'</br>';

}
else
{
$year = 'Year_Empty_Error';
$type = 'Type_Empty_Error';
$month = 'Month_Empty_Error';
$markers = 'Markers_Empty_Error';
$teststring = 'Markers_Empty_Error';
$teststring2 = $teststring;

}
//echo 'post'.$_POST['markers'].'</br>';

//$markers = json_decode($_POST['markers'],true);
//echo 'json'.$markers.'</br>';

//$teststring = join(",",$markers);
//echo $teststring.'</br>';
//$teststring2 = join(" ",$markers);
//echo $teststring2.'</br>';

//echo $markers.'</br>';

echo '</br>';

//  if(isset($_POST['submit']))
//  {
//	$str = json_decode($_POST['str'], true);
//  }

$arg = 'PATH="$PATH"';

//$teststring='165876,165877,166404,166405,166406,166933,166934,166935,165875,150555,150556,150557,151083,151084,151085,151086,151613,151614,151615,152142,152143,152144,152145,152671,152672,152673,152674,150554,132017,132018,132019,132020,132545,132546,132547,132548,132549,133074,133075,133076,133077,133078,133603,132016,148442,148443,148444,148971,148972,148973,149500,149501,149502,150029,150030,148441,146767,147290,147291,147292,147293,147294,147295,147296,147817,147818,147819,147820,147821,147822,147823,147824,147825,148346,148347,148348,148349,148350,148351,148352,148353,148354,148875,148876,148877,148878,148879,148880,148881,148882,148883,149404,149405,149406,149407,149408,149409,149410,149411,149412,149413,149933,149934,149935,149936,149937,149938,149939,149940,149941,149942,150463,150464,150465,150466,150467,146766,165328,165329,165330,165854,165855,165856,165857,165858,165859,166383,166384,166385,166386,166387,166388,166389,166912,166913,166914,166915,166916,166917,166918,167442,167443,167444,167445,167446,167447,167971,167972,167973,167974,167975,167976,168500,168501,168502,168503,168504,168505,169029,169030,165342,165343,165344,165870,165871,165872,165873,166399,166400,166401,166402,165341,141551,141552,141553,141554,142079,142080,142081,142082,142083,142608,142609,142610,142611,142612,143137,143138,143139,143140,143141,143666,143667,141550,160597,160598,160599,161125,161126,161127,161128,161654,161655,161656,161657,162184,162185,162186,160596';
if ($type=='Temp')
{
	if ($month==13)
	{
//Ronan Irish Water
//$teststring='97605'; 
//SWIM FULL
//$teststring='165876,165877,166404,166405,166406,166933,166934,166935,165875,150555,150556,150557,151083,151084,151085,151086,151613,151614,151615,152142,152143,152144,152145,152671,152672,152673,152674,150554,132017,132018,132019,132020,132545,132546,132547,132548,132549,133074,133075,133076,133077,133078,133603,132016,148442,148443,148444,148971,148972,148973,149500,149501,149502,150029,150030,148441,146767,147290,147291,147292,147293,147294,147295,147296,147817,147818,147819,147820,147821,147822,147823,147824,147825,148346,148347,148348,148349,148350,148351,148352,148353,148354,148875,148876,148877,148878,148879,148880,148881,148882,148883,149404,149405,149406,149407,149408,149409,149410,149411,149412,149413,149933,149934,149935,149936,149937,149938,149939,149940,149941,149942,150463,150464,150465,150466,150467,146766,165328,165329,165330,165854,165855,165856,165857,165858,165859,166383,166384,166385,166386,166387,166388,166389,166912,166913,166914,166915,166916,166917,166918,167442,167443,167444,167445,167446,167447,167971,167972,167973,167974,167975,167976,168500,168501,168502,168503,168504,168505,169029,169030,165342,165343,165344,165870,165871,165872,165873,166399,166400,166401,166402,165341,141551,141552,141553,141554,142079,142080,142081,142082,142083,142608,142609,142610,142611,142612,143137,143138,143139,143140,143141,143666,143667,141550,160597,160598,160599,161125,161126,161127,161128,161654,161655,161656,161657,162184,162185,162186,160596';
//$teststring='162186,166934,142083,166912,149935,132549,166401,148972,152143';

$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'1'.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
$cmd2 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'2'.' '.$teststring.'  > ./frontend_helpers/output_onepoint2.txt &';
$cmd3 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'3'.' '.$teststring.'  > ./frontend_helpers/output_onepoint3.txt &';
$cmd4 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'4'.' '.$teststring.'  > ./frontend_helpers/output_onepoint4.txt &';
$cmd5 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'5'.' '.$teststring.'  > ./frontend_helpers/output_onepoint5.txt &';
$cmd6 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'6'.' '.$teststring.'  > ./frontend_helpers/output_onepoint6.txt &';
$cmd7 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'7'.' '.$teststring.'  > ./frontend_helpers/output_onepoint7.txt &';
$cmd8 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'8'.' '.$teststring.'  > ./frontend_helpers/output_onepoint8.txt &';
$cmd9 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'9'.' '.$teststring.'  > ./frontend_helpers/output_onepoint9.txt &';
$cmd10 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'10'.' '.$teststring.'  > ./frontend_helpers/output_onepoint10.txt &';
$cmd11 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'11'.' '.$teststring.'  > ./frontend_helpers/output_onepoint11.txt &';
$cmd12 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.'12'.' '.$teststring.'  > ./frontend_helpers/output_onepoint12.txt &';
	}
	else
	{
$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Temp/Temp_multiprocess_NO-INTODB.py '.$year.' '.$month.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
	}
}
else if ($type=='VComp')
{
        if ($month==13)
        {
//$teststring='162186,166934,142083,166912,149935,132549,166401,148972,152143';
//UKEA
$teststring='42623,43149,43154,43678,43679,44725,44735,45791,45262,45271,45308,45309,45782,45790,45801,45835,45836,45841,46316,45787,46317,46332,46362,46363,46893,46364,46370,46862,46892,46901,47395,47396,47431,47905,47906,47377,47907,47925,47945,48434,48455,48454,48469,47942,48471,48473,49020,48491,48969,48997,49002,49019,49499,48984,49513,50042,49514,49515,49517,49522,49523,49525,49547,49548,49614,50030,50077,50606,50078,50079,50109,50560,50607,50608,50674,51136,51137,51180,51203,51204,51205,51619,51666,51695,51166,51696,51700,51701,51702,51723,51771,52148,52149,51620,51621,52150,52679,52194,52195,52226,52227,52239,52250,52251,52792,52263,52272,52297,52302,52680,52725,53254,52768,52791,52824,53209,53255,53293,53297,53298,53827,53828,53299,53300,53301,53302,53303,53307,53328,53331,53862,53333,53351,53362,53363,53785,53787,53823,53824,53829,53830,53832,53304,53833,53305,53834,53844,53849,53852,54382,53853,53854,53856,53863,53864,53866,53870,53876,53877,53878,53895,53897,53898,54268,54333,54372,54376,54379,54401,54403,54404,54796,54797,55326,54798,54799,54847,54848,54852,54853,54860,54861,54862,54902,54905,54960,55329,55858,55386,55387,56018,56553,56921,57613,58673,58675,58676,59041,59573,60269,60631,61160,61689,61856,62852,63443,64335,64502,64503,65032,65402,65404,65549,65552,65557,65558,66087,65559,65561,66088,66089,66090,66461,66604,66989,67012,67013,67130,67519,67540,67553,67658,68048,68049,68066,69109,68580,68582,68588,68611,70301,69772,69773,69244,69774,69775,69776,70200,70278,70729,71336,71790,72855,74989,75075,75076,75599,75605,75606,76130,76137,76666,78782,79313,79314,87258,87788,90963,90964,94137,94138,94667,95196,96253,98367,101007,102062,102588,102590,103098,103627,103636,104642,107856,108914,109972,110500,111029,112087,112615,117370,117814,117898,118344,118345,118875,121520,122132,122580,123189,123639,126284,126360,127341,127342,127871,128475,129458,129988,130591,130592,131122,130593,132706,133696,133763,134291,135273,135877,135348,137389,137916,139048,139513,140573,140631,140633,142146,142740,143268,143795,144325,143796,143797,144851,145847,145908,149553,149609,151724,152731,152782,153310,153838,153839,153840,154367,154368,156482,157540,157541,159127,160184,161243,161771,165474,166003,167589,168117,171814';


$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'1'.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
$cmd2 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'2'.' '.$teststring.'  > ./frontend_helpers/output_onepoint2.txt &';
$cmd3 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'3'.' '.$teststring.'  > ./frontend_helpers/output_onepoint3.txt &';
$cmd4 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'4'.' '.$teststring.'  > ./frontend_helpers/output_onepoint4.txt &';
$cmd5 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'5'.' '.$teststring.'  > ./frontend_helpers/output_onepoint5.txt &';
$cmd6 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'6'.' '.$teststring.'  > ./frontend_helpers/output_onepoint6.txt &';
$cmd7 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'7'.' '.$teststring.'  > ./frontend_helpers/output_onepoint7.txt &';
$cmd8 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'8'.' '.$teststring.'  > ./frontend_helpers/output_onepoint8.txt &';
$cmd9 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'9'.' '.$teststring.'  > ./frontend_helpers/output_onepoint9.txt &';
$cmd10 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'10'.' '.$teststring.'  > ./frontend_helpers/output_onepoint10.txt &';
$cmd11 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'11'.' '.$teststring.'  > ./frontend_helpers/output_onepoint11.txt &';
$cmd12 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.'12'.' '.$teststring.'  > ./frontend_helpers/output_onepoint12.txt &';
	}
	else
	{
$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.$month.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
	}
}
else if ($type=='UComp')
{
        if ($month==13)
        {
//$teststring='162186,166934,142083,166912,149935,132549,166401,148972,152143';
//UKEA
$teststring='42623,43149,43154,43678,43679,44725,44735,45791,45262,45271,45308,45309,45782,45790,45801,45835,45836,45841,46316,45787,46317,46332,46362,46363,46893,46364,46370,46862,46892,46901,47395,47396,47431,47905,47906,47377,47907,47925,47945,48434,48455,48454,48469,47942,48471,48473,49020,48491,48969,48997,49002,49019,49499,48984,49513,50042,49514,49515,49517,49522,49523,49525,49547,49548,49614,50030,50077,50606,50078,50079,50109,50560,50607,50608,50674,51136,51137,51180,51203,51204,51205,51619,51666,51695,51166,51696,51700,51701,51702,51723,51771,52148,52149,51620,51621,52150,52679,52194,52195,52226,52227,52239,52250,52251,52792,52263,52272,52297,52302,52680,52725,53254,52768,52791,52824,53209,53255,53293,53297,53298,53827,53828,53299,53300,53301,53302,53303,53307,53328,53331,53862,53333,53351,53362,53363,53785,53787,53823,53824,53829,53830,53832,53304,53833,53305,53834,53844,53849,53852,54382,53853,53854,53856,53863,53864,53866,53870,53876,53877,53878,53895,53897,53898,54268,54333,54372,54376,54379,54401,54403,54404,54796,54797,55326,54798,54799,54847,54848,54852,54853,54860,54861,54862,54902,54905,54960,55329,55858,55386,55387,56018,56553,56921,57613,58673,58675,58676,59041,59573,60269,60631,61160,61689,61856,62852,63443,64335,64502,64503,65032,65402,65404,65549,65552,65557,65558,66087,65559,65561,66088,66089,66090,66461,66604,66989,67012,67013,67130,67519,67540,67553,67658,68048,68049,68066,69109,68580,68582,68588,68611,70301,69772,69773,69244,69774,69775,69776,70200,70278,70729,71336,71790,72855,74989,75075,75076,75599,75605,75606,76130,76137,76666,78782,79313,79314,87258,87788,90963,90964,94137,94138,94667,95196,96253,98367,101007,102062,102588,102590,103098,103627,103636,104642,107856,108914,109972,110500,111029,112087,112615,117370,117814,117898,118344,118345,118875,121520,122132,122580,123189,123639,126284,126360,127341,127342,127871,128475,129458,129988,130591,130592,131122,130593,132706,133696,133763,134291,135273,135877,135348,137389,137916,139048,139513,140573,140631,140633,142146,142740,143268,143795,144325,143796,143797,144851,145847,145908,149553,149609,151724,152731,152782,153310,153838,153839,153840,154367,154368,156482,157540,157541,159127,160184,161243,161771,165474,166003,167589,168117,171814';


$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'1'.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
$cmd2 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'2'.' '.$teststring.'  > ./frontend_helpers/output_onepoint2.txt &';
$cmd3 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'3'.' '.$teststring.'  > ./frontend_helpers/output_onepoint3.txt &';
$cmd4 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'4'.' '.$teststring.'  > ./frontend_helpers/output_onepoint4.txt &';
$cmd5 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'5'.' '.$teststring.'  > ./frontend_helpers/output_onepoint5.txt &';
$cmd6 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'6'.' '.$teststring.'  > ./frontend_helpers/output_onepoint6.txt &';
$cmd7 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'7'.' '.$teststring.'  > ./frontend_helpers/output_onepoint7.txt &';
$cmd8 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'8'.' '.$teststring.'  > ./frontend_helpers/output_onepoint8.txt &';
$cmd9 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'9'.' '.$teststring.'  > ./frontend_helpers/output_onepoint9.txt &';
$cmd10 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'10'.' '.$teststring.'  > ./frontend_helpers/output_onepoint10.txt &';
$cmd11 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'11'.' '.$teststring.'  > ./frontend_helpers/output_onepoint11.txt &';
$cmd12 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.'12'.' '.$teststring.'  > ./frontend_helpers/output_onepoint12.txt &';
        }
	else
	{
$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/UComp/UComp_multiprocess_NO-INTODB.py '.$year.' '.$month.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
	}
}
else if ($type=='Soil')
{
        if ($month==13)
        {
//$teststring='165876,165877,166404,166405,166406,166933,166934,166935,165875,150555,150556,150557,151083,151084,151085,151086,151613,151614,151615,152142,152143,152144,152145,152671,152672,152673,152674,150554,132017,132018,132019,132020,132545,132546,132547,132548,132549,133074,133075,133076,133077,133078,133603,132016,148442,148443,148444,148971,148972,148973,149500,149501,149502,150029,150030,148441,146767,147290,147291,147292,147293,147294,147295,147296,147817,147818,147819,147820,147821,147822,147823,147824,147825,148346,148347,148348,148349,148350,148351,148352,148353,148354,148875,148876,148877,148878,148879,148880,148881,148882,148883,149404,149405,149406,149407,149408,149409,149410,149411,149412,149413,149933,149934,149935,149936,149937,149938,149939,149940,149941,149942,150463,150464,150465,150466,150467,146766,165328,165329,165330,165854,165855,165856,165857,165858,165859,166383,166384,166385,166386,166387,166388,166389,166912,166913,166914,166915,166916,166917,166918,167442,167443,167444,167445,167446,167447,167971,167972,167973,167974,167975,167976,168500,168501,168502,168503,168504,168505,169029,169030,165342,165343,165344,165870,165871,165872,165873,166399,166400,166401,166402,165341,141551,141552,141553,141554,142079,142080,142081,142082,142083,142608,142609,142610,142611,142612,143137,143138,143139,143140,143141,143666,143667,141550,160597,160598,160599,161125,161126,161127,161128,161654,161655,161656,161657,162184,162185,162186,160596';


$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'1'.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
$cmd2 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'2'.' '.$teststring.'  > ./frontend_helpers/output_onepoint2.txt &';
$cmd3 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'3'.' '.$teststring.'  > ./frontend_helpers/output_onepoint3.txt &';
$cmd4 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'4'.' '.$teststring.'  > ./frontend_helpers/output_onepoint4.txt &';
$cmd5 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'5'.' '.$teststring.'  > ./frontend_helpers/output_onepoint5.txt &';
$cmd6 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'6'.' '.$teststring.'  > ./frontend_helpers/output_onepoint6.txt &';
$cmd7 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'7'.' '.$teststring.'  > ./frontend_helpers/output_onepoint7.txt &';
$cmd8 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'8'.' '.$teststring.'  > ./frontend_helpers/output_onepoint8.txt &';
$cmd9 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'9'.' '.$teststring.'  > ./frontend_helpers/output_onepoint9.txt &';
$cmd10 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'10'.' '.$teststring.'  > ./frontend_helpers/output_onepoint10.txt &';
$cmd11 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'11'.' '.$teststring.'  > ./frontend_helpers/output_onepoint11.txt &';
$cmd12 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.'12'.' '.$teststring.'  > ./frontend_helpers/output_onepoint12.txt &';
        }
        else
        {
$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Soil/Soil_multiprocess_NO-INTODB.py '.$year.' '.$month.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
	}
}
else if ($type=='DNI')
{
        if ($month==13)
        {
//$teststring='162186,166934,142083,166912,149935,132549,166401,148972,152143';

$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'1'.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
$cmd2 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'2'.' '.$teststring.'  > ./frontend_helpers/output_onepoint2.txt &';
$cmd3 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'3'.' '.$teststring.'  > ./frontend_helpers/output_onepoint3.txt &';
$cmd4 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'4'.' '.$teststring.'  > ./frontend_helpers/output_onepoint4.txt &';
$cmd5 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'5'.' '.$teststring.'  > ./frontend_helpers/output_onepoint5.txt &';
$cmd6 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'6'.' '.$teststring.'  > ./frontend_helpers/output_onepoint6.txt &';
$cmd7 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'7'.' '.$teststring.'  > ./frontend_helpers/output_onepoint7.txt &';
$cmd8 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'8'.' '.$teststring.'  > ./frontend_helpers/output_onepoint8.txt &';
$cmd9 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'9'.' '.$teststring.'  > ./frontend_helpers/output_onepoint9.txt &';
$cmd10 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  /var/www/html/mera/map/backup/thread/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'10'.' '.$teststring.'  > ./frontend_helpers/output_onepoint10.txt &';
$cmd11 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  /var/www/html/mera/map/backup/thread/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'11'.' '.$teststring.'  > ./frontend_helpers/output_onepoint11.txt &';
$cmd12 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  /var/www/html/mera/map/backup/thread/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.'12'.' '.$teststring.'  > ./frontend_helpers/output_onepoint12.txt &';
        }
        else
        {
$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/DNI/DNI_multiprocess_NO-INTODB.py '.$year.' '.$month.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
	}
}
else if ($type=='Press')
{
        if ($month==13)
        {
//$teststring='162186,166934,142083,166912,149935,132549,166401,148972,152143';

$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'1'.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
$cmd2 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'2'.' '.$teststring.'  > ./frontend_helpers/output_onepoint2.txt &';
$cmd3 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'3'.' '.$teststring.'  > ./frontend_helpers/output_onepoint3.txt &';
$cmd4 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'4'.' '.$teststring.'  > ./frontend_helpers/output_onepoint4.txt &';
$cmd5 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'5'.' '.$teststring.'  > ./frontend_helpers/output_onepoint5.txt &';
$cmd6 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'6'.' '.$teststring.'  > ./frontend_helpers/output_onepoint6.txt &';
$cmd7 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'7'.' '.$teststring.'  > ./frontend_helpers/output_onepoint7.txt &';
$cmd8 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'8'.' '.$teststring.'  > ./frontend_helpers/output_onepoint8.txt &';
$cmd9 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'9'.' '.$teststring.'  > ./frontend_helpers/output_onepoint9.txt &';
$cmd10 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'10'.' '.$teststring.'  > ./frontend_helpers/output_onepoint10.txt &';
$cmd11 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'11'.' '.$teststring.'  > ./frontend_helpers/output_onepoint11.txt &';
$cmd12 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.'12'.' '.$teststring.'  > ./frontend_helpers/output_onepoint12.txt &';
        }
        else
        {
$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Press/Press_multiprocess_NO-INTODB.py '.$year.' '.$month.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
}
}
else
{
	if ($month==13)
	{
//$teststring='165876,165877,166404,166405,166406,166933,166934,166935,165875,150555,150556,150557,151083,151084,151085,151086,151613,151614,151615,152142,152143,152144,152145,152671,152672,152673,152674,150554,132017,132018,132019,132020,132545,132546,132547,132548,132549,133074,133075,133076,133077,133078,133603,132016,148442,148443,148444,148971,148972,148973,149500,149501,149502,150029,150030,148441,146767,147290,147291,147292,147293,147294,147295,147296,147817,147818,147819,147820,147821,147822,147823,147824,147825,148346,148347,148348,148349,148350,148351,148352,148353,148354,148875,148876,148877,148878,148879,148880,148881,148882,148883,149404,149405,149406,149407,149408,149409,149410,149411,149412,149413,149933,149934,149935,149936,149937,149938,149939,149940,149941,149942,150463,150464,150465,150466,150467,146766,165328,165329,165330,165854,165855,165856,165857,165858,165859,166383,166384,166385,166386,166387,166388,166389,166912,166913,166914,166915,166916,166917,166918,167442,167443,167444,167445,167446,167447,167971,167972,167973,167974,167975,167976,168500,168501,168502,168503,168504,168505,169029,169030,165342,165343,165344,165870,165871,165872,165873,166399,166400,166401,166402,165341,141551,141552,141553,141554,142079,142080,142081,142082,142083,142608,142609,142610,142611,142612,143137,143138,143139,143140,143141,143666,143667,141550,160597,160598,160599,161125,161126,161127,161128,161654,161655,161656,161657,162184,162185,162186,160596';

$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'1'.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
$cmd2 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'2'.' '.$teststring.'  > ./frontend_helpers/output_onepoint2.txt &';
$cmd3 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'3'.' '.$teststring.'  > ./frontend_helpers/output_onepoint3.txt &';
$cmd4 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'4'.' '.$teststring.'  > ./frontend_helpers/output_onepoint4.txt &';
$cmd5 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'5'.' '.$teststring.'  > ./frontend_helpers/output_onepoint5.txt &';
$cmd6 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'6'.' '.$teststring.'  > ./frontend_helpers/output_onepoint6.txt &';
$cmd7 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'7'.' '.$teststring.'  > ./frontend_helpers/output_onepoint7.txt &';
$cmd8 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'8'.' '.$teststring.'  > ./frontend_helpers/output_onepoint8.txt &';
$cmd9 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'9'.' '.$teststring.'  > ./frontend_helpers/output_onepoint9.txt &';
$cmd10 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'10'.' '.$teststring.'  > ./frontend_helpers/output_onepoint10.txt &';
$cmd11 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'11'.' '.$teststring.'  > ./frontend_helpers/output_onepoint11.txt &';
$cmd12 = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.'12'.' '.$teststring.'  > ./frontend_helpers/output_onepoint12.txt &';
	}
	else
	{
$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  ../../backend/Rainfall/Rainfall_multiprocess_WEBSERVER_2020_esas.py '.$year.' '.$month.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
//$cmd = 'sudo  -u root env '.$arg.'  /home/lgorgu/miniconda3/bin/python  /var/www/html/mera/map/backup/thread/VComp/VComp_multiprocess_NO-INTODB.py '.$year.' '.$teststring.'  > ./frontend_helpers/output_onepoint.txt &';
	}
}

//echo 'error: '.$error;
if ($error==0)
{
if ($month==13)
{
?>
<script>
jQuery.ajax({
//  var datatosend=selectedVar;
  url: "https://aqua.ucd.ie/mera/map/which.php",
  type : 'POST',
  data: {album:''},
    success: function(response) {
//        content.html(response);
    }
});
</script>
<?php
$command = shell_exec($cmd);
$command = shell_exec($cmd2);
$command = shell_exec($cmd3);
$command = shell_exec($cmd4);
$command = shell_exec($cmd5);
$command = shell_exec($cmd6);
$command = shell_exec($cmd7);
$command = shell_exec($cmd8);
$command = shell_exec($cmd9);
$command = shell_exec($cmd10);
$command = shell_exec($cmd11);
$command = shell_exec($cmd12);
}
else
{
//echo '<center><font color=green>Starting.</font></center>';
$command = shell_exec($cmd);
echo "<center><pre>".$command."</br>".$cmd."</pre></center>";
}
}
else
{
echo '</br></br></br><center><font color=red><h1>Errors occured.</h1></font></center>';
}


if($error >0){
//Set Refresh header using PHP.
header( "refresh:9;url=../" );

//Print out some content for example purposes.
echo '<center><h1>You will be redirected to main page in 10 seconds.</h1></center>';
exit;
    // Your application has indicated there's an error
//    window.setTimeout(function(){

        // Move to a new location or you can do something else
//        window.location.href = "https://aqua.ucd.ie/swim/mera/map/extractor.php";

//    }, 5000);

}


//echo "<center><pre>".$command."</br>".$cmd."</pre></center>";


if ($month=='1')$month='January';
if ($month=='2')$month='February';
if ($month=='3')$month='March';
if ($month=='4')$month='April';
if ($month=='5')$month='May';
if ($month=='6')$month='June';
if ($month=='7')$month='July';
if ($month=='8')$month='August';
if ($month=='9')$month='September';
if ($month=='10')$month='October';
if ($month=='11')$month='November';
if ($month=='12')$month='December';
if ($month=='13')$month='ALL';


echo '<center></br></br></br></br><font size=5>Give Python and ecCodes time and extraction will start with point(s); <font color=red>'.$teststring.'</font></br>for <i>sensor type</i><font color=green> '.$type.'</font> <b>@</b><font color=blue> '.$month.' '.$year.'</font></font></center></br>';
?>









<center>

<font size=5>
<!--
.Output Sream Watch.
<a target=_blank href="watch.html" id="download" class="button" style="display: none">Watch the output steam of process...</a>
<p id="notice">Give python and eccodes a little time... </br>You will be able to watch the extraction progress after 2 minutes</p>
</font>
-->

<!--<p>Give python and eccodes a little time. </br>... You will be able to watch the extraction progress shortly ...</p>-->
</br><p>... You will be able to watch the extraction progress shortly ...</p></br>


<!--

<div id="wrapper">.Live Graph.
  <div id="myTimer"></div>
  <button type="button" id="myBtn" class="btnDisable" disabled onclick="window.open('graph_onepoint.php','_blank')">Please wait...</button>
</div>

<div id="wrapper2">.CSV Output Stream Watch.
  <div id="myTimer2"></div>
  <button type="button2" id="myBtn2" class="btnDisable"2 disabled onclick="window.open('text_onepoint.html','_blank')">Please wait...</button>
</div>
-->

<!--
<div id="wrapper3"><font color=red>do not close this page and please use it as a navigation point to watch the output</font>
  <div id="myTimer3"></div>
<table><tr><td>
  <button type="button3" id="myBtn3" class="btnDisable3" disabled onclick="window.open('graph_multipoint_2020.php','_blank')">Please wait...</button>
</td><td>
  <button type="button2" id="myBtn2" class="btnDisable2" disabled onclick="window.open('text_onepoint.html','_blank')">Please wait...</button>
</td><td>
  <button type="button" id="myBtn" class="btnDisable" disabled onclick="window.open('all_onepoint.html','_blank')">Please wait...</button>
</td></tr></table>
</div>
-->


<div id="wrapper3"><!--Watch the Extraction Progress--><font color=red>PLEASE DO NOT CLOSE THIS PAGE<!--and please use it as a navigation point to watch the output--></font>

<progress id="file" max="100" value="0">test </progress></br>
<label id="test"></label>


  <div id="myTimer3"></div>
<table><tr><td>
<?php
if ($month=='ALL')
{?>
  <button type="button3" id="myBtn3" class="btnDisable3" disabled onclick="window.open('graph_multipoint_2020_year.php','_blank')"><b><font size=3>Please wait...</font></b></button>
<?php
}
else
{?>
  <button type="button3" id="myBtn3" class="btnDisable3" disabled onclick="window.open('graph_multipoint_2020.php','_blank')"><b><font size=3>Please wait...</font></b></button>
<?php
}
?>
</td><td>
<?php
if ($month=='ALL')
{?>
  <button type="button2" id="myBtn2" class="btnDisable2" disabled onclick="window.open('text_onepoint_year.php','_blank')"><b><font size=3>Please wait...</font></b></button>
<?php
}
else
{?>
  <button type="button2" id="myBtn2" class="btnDisable2" disabled onclick="window.open('text_onepoint.php','_blank')"><b><font size=3>Please wait...</font></b></button>
<?php
}
?>
</td></tr></table>
</div>




</font>

<!--<font color=red>do not close this page and please use it as a navigation point to watch the output</font>-->
</center>



<script>


$(function(){

  window.setInterval(function(){
    loadLatestResults();
  }, 3000);

  function loadLatestResults(){

    $.ajax({
      url : 'prog_bar.php',
      cache : false,
      success : function(data){
//        $('#id-of-element-into-which-results-are-loaded').html(data);

if (parseInt(data)>=100)
{        $('#test').html('<font color=green>Extraction process: 100% [finished]</font></br></br><a href=\"../github\" target=_blank><button  type=\"button\">Check Exported CSVs</br></button></a></br><a href=../../swim/mera/github/index.php>return to main page</a>');
}
else if (parseInt(data)<=0)
{        $('#test').html('<font color=red>Extraction process: 0% starting...</font>');
}
else
{       $('#test').html('<font  color=blue>Extraction process: '+parseInt(data)+'%</font>');
}
        $('#file').val(data);
//	$('#toptitle').text(data);
//$('#progBar').attr('value',50);
//$('#progBar').val(70);

      }
    });
  }

});



function start() {
//  countDown();
//  countDown2();
  countDown3();
}
window.onload = start;

var sec = 59;
var myTimer = document.getElementById('myTimer');
var myBtn = document.getElementById('myBtn');
//window.onload = countDown;

function countDown() {
  if (sec < 10) {
    myTimer.innerHTML = "0" + sec;
  } else {
    myTimer.innerHTML = sec;
  }
  if (sec <= 0) {
    $("#myBtn").removeAttr("disabled");
    $("#myBtn").removeClass().addClass("btnEnable");
    $("#myTimer").fadeTo(2500, 0);
    myBtn.innerHTML = "Watch CVS File's Output Steam!";
    return;
  }
  sec -= 1;
  window.setTimeout(countDown, 1000);
}


var sec2 = 59;
var myTimer2 = document.getElementById('myTimer2');
var myBtn2 = document.getElementById('myBtn2');
//window.onload = countDown2;

function countDown2() {
  if (sec2 < 10) {
    myTimer2.innerHTML = "0" + sec2;
  } else {
    myTimer2.innerHTML = sec2;
  }
  if (sec2 <= 0) {
    $("#myBtn2").removeAttr("disabled");
    $("#myBtn2").removeClass().addClass("btnEnable");
    $("#myTimer2").fadeTo(2500, 0);
    myBtn2.innerHTML = "Look at Live Graph!";
    return;
  }
  sec2 -= 1;
  window.setTimeout(countDown2, 1000);
}


var sec3 = 59;
//var sec3 =5;
var myTimer3 = document.getElementById('myTimer3');
var myBtn3 = document.getElementById('myBtn3');
//var myBtn = document.getElementById('myBtn');
var myBtn2 = document.getElementById('myBtn2');
//window.onload = countDown2;

function countDown3() {
  if (sec3 < 10) {
    myTimer3.innerHTML = "0" + sec3;
  } else {
    myTimer3.innerHTML = sec3;
  }
  if (sec3 <= 0) {
    $("#myBtn3").removeAttr("disabled");
    $("#myBtn3").removeClass().addClass("btnEnable");
    $("#myTimer3").fadeTo(2500, 0);
    myBtn3.innerHTML = "<b><font size=3>Watch in  Line Graph !</font></b>";

   // $("#myBtn").removeAttr("disabled");
   // $("#myBtn").removeClass().addClass("btnEnable");
   // $("#myTimer").fadeTo(2500, 0);
   // myBtn2.innerHTML = "Watch  CSV Output Stream !(Tabular From)";


    $("#myBtn2").removeAttr("disabled");
    $("#myBtn2").removeClass().addClass("btnEnable");
    $("#myTimer2").fadeTo(2500, 0);
    myBtn2.innerHTML = "<b><font size=3>Watch in Tabular Form !</font></b>";

    return;
  }
  sec3 -= 1;


jQuery.ajax({
      url : 'prog_bar.php',
      cache : false,
      success : function(data){
//        $('#id-of-element-into-which-results-are-loaded').html(data);

console.log(data);
if (parseInt(data)>=100)
{        var bokcuk=1; //$('#test').html('<font color=green>Extraction process: 100% [finished]</font></br></br><a href=\"https://aqua.ucd.ie/mera/map\" target=_blank><button  type=\"button\">Check Exported CSVs</br></button></a></br><a$
}
else if (parseInt(data)<=0)
{        var bok=1; //$('#test').html('<font color=red>Extraction process: 0% starting...</font>');
}
else
{       sec3=0; //$('#test').html('<font  color=blue>Extraction process: '+parseInt(data)+'%</font>');
}
//        $('#file').val(data);
//      $('#toptitle').text(data);
//$('#progBar').attr('value',50);
//$('#progBar').val(70);

      }
    });


  window.setTimeout(countDown3, 1000);
}
</script>





</body>
</html>

