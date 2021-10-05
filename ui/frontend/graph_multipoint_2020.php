<?php


$file = file("./frontend_helpers/output_onepoint.txt");
for ($i = max(0, count($file)-1); $i < count($file); $i++) {
//  echo $file[$i] . "</br>";

$test=split2($file[$i],',',4);
//echo $test[0] . "</br>";
//echo $test[1] . "</br>";
////echo substr($test[1],0,2) . "</br>";
//echo substr($test[1], 0, 2) . "</br>";
$day=(int)substr($test[1],0,2);
//echo $day . "</br>";
//$percent=(($day*100)/31);
//echo $percent . "</br>";

//echo $test

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
?>
<html>
<head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<style>
#wrapper {
//  height: 1000px;
  height: 75%;
  width: 85%;
}
</style>


</head>
<body>

<center>
<!--<button onclick="update('')">Januray</button>
<button onclick="update('2')">February</button>
<button onclick="update('3')">March</button>
<button onclick="update('4')">April</button>
<button onclick="update('5')">May</button>
<button onclick="update('6')">June</button>
<button onclick="update('7')">July</button>
<button onclick="update('8')">August</button>
<button onclick="update('9')">September</button>
<button onclick="update('10')">October</button>
<button onclick="update('11')">November</button>
<button onclick="update('12')">December</button>-->

</br>


<font size=3>
<font color=red><div id="countdown"></div></font>

<b>
<input id="ClickMe" type="button" value="Stop Auto-Refresh" onclick="myStopFunction();" />&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<input id="ClickMe" type="button" value="Refresh" onclick="myStartFunction();" />
</b>
</br>
</br>

<label id="test"></label>&nbsp<progress id="file" max="100" value="0">test </progress></br>
<!--<label id="test"></label>-->

<!--
<?php
if ($percent==null)
{
$percent=0;
//echo 'yoyo';
}
else if ($percent>=100)
{
$percent=100;
}
?>

<label for="file">Extraction progress: <?php echo (int)$percent?> %</label>

<?php
if ($percent==null)
{
$percent=0;
//echo 'yoyo';
}
else if ($percent>=100)
{
$percent=100;
}
?>
<progress id="file" max="100" value="70"> <?php echo $percent ?>% </progress>

<?php

if ($percent==null)
{
$percent=0;
echo '<font size=3 color=red><b>starting...</b></font></br>';
}
else if ($percent>=100)
{
$percent=100;
echo '<font size=3 color=red><b>[finished]</b></font></br>';

}

?>
-->



<script>
document.getElementById("file").value = "<?php echo $percent ?>";


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
//{        $('#test').html('<font size=3 color=green>100% [finished]</font></br></br><a href=\"https://aqua.ucd.ie/mera/map\" target=_blank><button  type=\"button\">Check Exported CSVs</br></button></a></br>');
{        $('#test').html('<font size=3 color=green>Extraction process: 100% [finished]</font>');

}
else if (parseInt(data)==0)
//{        $('#test').html('<font size=3 color=red>Extraction process: 0% starting...</font>');
{        $('#test').html('<font size=3 color=green>-No Ongoing Extraction-</font>');

}
else if (parseInt(data)<=0)
//{        $('#test').html('<font size=3 color=green>-No Ongoing Extraction-</font>');
{        $('#test').html('<font size=3 color=red>Extraction process: 0% starting...</font>');

}
else
{       $('#test').html('<font size=3 color=blue>Extraction process: '+parseInt(data)+'%</font>');
}
        $('#file').val(data);
//	$('#toptitle').text(data);
//$('#progBar').attr('value',50);
//$('#progBar').val(70);

      }
    });
  }

});



</script>


</font>


<div id="wrapper">
<!--<button id="toggle" style="float: right;">show selected/hide all</button>-->
  <canvas id="chart">
</canvas>
</div>


<b>
<font size=3>
<center><a href="text_onepoint.php" target=_blank>Go to Tabular View</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="../" target=_blank>Return to Main Page</a></br>

</br>

 <a href="./frontend_helpers/output_onepoint.txt" download><button  type="button">Direct Download</br> (Current Version in TXT format)</button></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="../" target=_blank><button  type="button">Check Exported CSVs</br> (Current Version in CSV format)</button></a>
</b>
</font>
</br></br>

<!--
<label for="file">Extraction progress: <?php echo (int)$percent?> %</label>

<?php
if ($percent==null)
{
$percent=0;
//echo 'yoyo';
}
?>
<progress id="file" max="100" value="70"> <?php echo $percent ?>% </progress>

<?php

if ($percent==null)
{
//$percent=0;
echo '<font size=3 color=red><b>starting...</b></font></br>';
}
else if ($percent>=100)
{
echo '<font size=3 color=green><b>[finished]</b></font></br>';

}

?>
-->



<script>
document.getElementById("file").value = "<?php echo $percent ?>";
</script>

</center>


</font>

</center>

<script>


function myStartFunction() {
location.reload(true);
//myVar = setTimeout(function(){ countdown(25); }, 1000);
}

(function countdown(remaining) {
    if(remaining === 0)
        location.reload(true);
//    $('#wrapper').load(document.URL +  ' #wrapper');
    document.getElementById('countdown').innerHTML = "This page will auto-refresh in " +remaining + " seconds to update with new data";
myVar = setTimeout(function(){ countdown(remaining - 1); }, 1000);
})(25);

function myStopFunction() {
  clearTimeout(myVar);
}

function makeChart(players) {
  // players is an array of objects where each object is something like:
  // {
  //   "Name": "Steffi Graf",
  //   "Weeks": "377",
  //   "Gender": "Female"
  // }

//console.log(players);
  var playerLabels = players.map(function(d) {
    return d.timestamp;
  });
  var weeksData = players.map(function(d) {
    return +d.value;
  });
  var indexNumber = players.map(function(d) {
    return d.index;
  });


  var nedir = players.map(function(d) {
    return d.name;
  });

Array.prototype.contains = function(v) {
  for (var i = 0; i < this.length; i++) {
    if (this[i] === v) return true;
  }
  return false;
};

Array.prototype.unique = function() {
  var arr = [];
  for (var i = 0; i < this.length; i++) {
    if (!arr.contains(this[i])) {
      arr.push(this[i]);
    }
  }
  return arr;
}

var duplicates = indexNumber;
var uniques = duplicates.unique(); // result = [1,3,4,2,8]

console.log(uniques);


//console.log(players.length);
console.log(uniques.length);


var dataz=[];
var zdata1=[];
var zdata2=[];
var zdata3=[];
var zdata4=[];
var zdata5=[];
var zdata6=[];
var zdata7=[];
var zdata8=[];
var zdata9=[];
var datezozaman =[];

for ( var i = 0; i < uniques.length; i++ ) {
    dataz[i] = [];
}

var checker=0;
var i;
for (i = 0; i < players.length;i++) {
if (players[i].index==uniques[0])
{
//console.log("value:"+players[i].value+" index:"+players[i].index+" date:"+players[i].timestamp);
zdata1.push(players[i].value);
datezozaman.push(players[i].timestamp);
}
else if (players[i].index==uniques[1])
{
zdata2.push(players[i].value);
}
else if (players[i].index==uniques[2])
{
zdata3.push(players[i].value);
}

else if (players[i].index==uniques[3])
{
zdata4.push(players[i].value);
}

else if (players[i].index==uniques[4])
{
zdata5.push(players[i].value);
}

else if (players[i].index==uniques[5])
{
zdata6.push(players[i].value);
}

else if (players[i].index==uniques[6])
{
zdata7.push(players[i].value);
}

else if (players[i].index==uniques[7])
{
zdata8.push(players[i].value);
}

else if (players[i].index==uniques[8])
{
zdata9.push(players[i].value);
}

/*
zdata1.push(players[i].value);
dataz[uniques.length-uniques.length].push(players[i].value);
dataz[uniques.length-uniques.length+1].push(players[i+1].value);
dataz[uniques.length-uniques.length+2].push(players[i+2].value);
dataz[uniques.length-uniques.length+3].push(players[i+3].value);
dataz[uniques.length-uniques.length+4].push(players[i+4].value);
dataz[uniques.length-uniques.length+5].push(players[i+5].value);
dataz[uniques.length-uniques.length+6].push(players[i+6].value);
dataz[uniques.length-uniques.length+7].push(players[i+7].value);
dataz[uniques.length-uniques.length+8].push(players[i+8].value);
*/
}
//console.log(dataz[0]);
//console.log(dataz[1]);
//console.log(zdata1);
//console.log(datezozaman);

const result = [];
const map = new Map();
for (const item of players) {
    if(!map.has(item.index)){
        map.set(item.index, true);    // set any value to Map
        result.push({
            index: item.index,
            timestamp: item.timestamp,
	    value: item.value
        });
    }
}
console.log(result)


//for (
console.log(playerLabels[0]);
console.log(weeksData[0]);
console.log(indexNumber[0]);
console.log(indexNumber[1]);
console.log(indexNumber[2]);

//var IndexPoint = players[1].index;

var chart = null;
if (uniques.length==3)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],
        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },
labels: {
//                fontColor: 'rgb(255, 99, 132)',
                fontSize: 16,
//              boxWidth:45
            }

      },
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques
        }
    },
    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
},{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
},{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
},
/*
{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
},{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
},{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
},{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
},{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}*/],

    }
  });
}
//}

if (uniques.length==2)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],
        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },
labels: {
//                fontColor: 'rgb(255, 99, 132)',
                fontSize: 16,
//              boxWidth:45
            }

      },
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques
        }
    },
    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
},{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
},/*{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
},{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
},{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
},{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
},{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
},{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}*/],

    }
  });
}

if (uniques.length>=9)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],
        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },
labels: {
//                fontColor: 'rgb(255, 99, 132)',
                fontSize: 16,
//              boxWidth:45
            }

      },
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques.slice(0, 9)
        }
    },
    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
},{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
},{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
},{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
},{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
},{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
},{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
},{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}],

    }
  });
}


if (uniques.length==8)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],

        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },
labels: {
//                fontColor: 'rgb(255, 99, 132)',
                fontSize: 16,
//              boxWidth:45
            }

},
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques
        }
    },
    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
},{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
},{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
},{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
},{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
},{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
},{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
},{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},/*{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}*/],

    }
  });
}


if (uniques.length==7)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],
        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },
labels: {
//                fontColor: 'rgb(255, 99, 132)',
                fontSize: 16,
//              boxWidth:45
            }

      },
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques
        }
    },


    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
//   hidden: false,
},{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
//   hidden: false,
},{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
//   hidden: false,
},{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
//   hidden: false,
},{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
//   hidden: false,
},{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
//   hidden: false,
},{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
//   hidden: false,
},/*{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}*/],

    }
  });
}

if (uniques.length==6)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],
        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },
labels: {
//                fontColor: 'rgb(255, 99, 132)',
                fontSize: 16,
//              boxWidth:45
            }

      },
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques
        }
    },
    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
},{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
},{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
},{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
},{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
},{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
},/*{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
},{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}*/],

    }
  });
}

if (uniques.length==5)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],
        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },
labels: {
//                fontColor: 'rgb(255, 99, 132)',
                fontSize: 16,
//              boxWidth:45
            }

      },
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques
        }
    },
    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
},{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
},{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
},{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
},{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
},/*{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
},{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
},{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}*/],

    }
  });
}

if (uniques.length==4)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],
        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },

labels: {
//                fontColor: 'rgb(255, 99, 132)',
		fontSize: 16,
//		boxWidth:45
            }
      },
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques
        }
    },
    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
//borderWidth:5,
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
},{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
},{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
},{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
},/*{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
},{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
},{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
},{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}*/],

    }
  });
}

if (uniques.length==1)
{
 chart = new Chart('chart', {
//    type: "bar",
	type:"line",
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
	legendText: ['Temperature'],
        onHover: function(event, legendItem) {
          document.getElementById("chart").style.cursor = 'pointer';
        },

        onClick: function(e, legendItem) {
          var index = legendItem.datasetIndex;
          var ci = this.chart;
//var alreadyHidden = (ci.getDatasetMeta(index).hidden === null);
//          var alreadyHidden = (this.chart.getDatasetMeta(0).data[legendItem.index].hidden === null) ? false : this.chart.getDatasetMeta(0).data[legendItem.index].hidden;
          var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;


          ci.data.datasets.forEach(function(e, i) {
//            var meta = this.chart.getDatasetMeta(0).data[legendItem.i];
            var meta = ci.getDatasetMeta(i);
//            var meta = ci.getDatasetMeta(i);




            if (i !== index) {
              if (!alreadyHidden) {
                meta.hidden = meta.hidden === null ? !meta.hidden : null;
              } else if (meta.hidden === null) {
                meta.hidden = true;
              }
            } else if (i === index) {
              meta.hidden = null;
            }
          });

          ci.update();
        },
labels: {
//                fontColor: 'rgb(255, 99, 132)',
                fontSize: 16,
//              boxWidth:45
            }

      },
    title: {
            display: true,
	    fontSize: 22,
            text: "Showing *"+nedir[0]+"* for Grib Index Points "+uniques
        }
    },
    data: {
labels:datezozaman,
//      labels: playerLabels,
//      datasets: [
//        {
//          data: weeksData,
//        }
//      ],

datasets: [{
   label: uniques[0]+' '+nedir[0],
//   label: uniques[0]+" TEST",
   fill: false,
   borderColor: "red",
//   borderDash: [5, 5],
   backgroundColor: "red",
   pointBackgroundColor: "red",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "red",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata1,
},
/*{
   label: uniques[1]+' '+nedir[0],
//   label: 'Temperature2',
   fill: false,
   borderColor: "blue",
//   borderColor: "#3300ff",
//   borderDash: [5, 5],
   backgroundColor: "blue",
   pointBackgroundColor: "blue",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "blue",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata2,
},{
   label: uniques[2]+' '+nedir[0],
//   label: 'Temperature3',
   fill: false,
   borderColor: "yellow",
//   borderColor: "#6600ff",
//   borderDash: [5, 5],
   backgroundColor: "yellow",
   pointBackgroundColor: "yellow",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "yellow",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata3,
},{
   label: uniques[3]+' '+nedir[0],
//   label: 'Temperature4',
   fill: false,
   borderColor: "orange",
//   borderColor: "#9900ff",
//   borderDash: [5, 5],
   backgroundColor: "orange",
   pointBackgroundColor: "orange",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "orange",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata4,
},{
   label: uniques[4]+' '+nedir[0],
//   label: 'Temperature5',
   fill: false,
   borderColor: "green",
//   borderDash: [5, 5],
   backgroundColor: "green",
   pointBackgroundColor: "green",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "green",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata5,
},{
   label: uniques[5]+' '+nedir[0],
//   label: 'Temperature6',
   fill: false,
   borderColor: "purple",
//   borderDash: [5, 5],
   backgroundColor: "purple",
   pointBackgroundColor: "purple",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "purple",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata6,
},{
   label: uniques[6]+' '+nedir[0],
//   label: 'Temperature7',
   fill: false,
   borderColor: "black",
//   borderDash: [5, 5],
   backgroundColor: "black",
   pointBackgroundColor: "black",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "black",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata7,
},{
   label: uniques[7]+' '+nedir[0],
//   label: 'Temperature8',
   fill: false,
   borderColor: "grey",
//   borderDash: [5, 5],
   backgroundColor: "grey",
   pointBackgroundColor: "grey",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "grey",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata8,
},{
   label: uniques[8]+' '+nedir[0],
//   label: 'Temperature9',
   fill: false,
   borderColor: "pink",
//   borderDash: [5, 5],
   backgroundColor: "pink",
   pointBackgroundColor: "pink",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "pink",
   pointHoverBorderColor: "#55bae7",
   pointRadius: 5,
   pointHoverRadius: 25,
   data: zdata9,
}*/],

    },

});
}

$("#toggle").click(function() {





         chart2.data.datasets.forEach(function(ds,i) {
//console.log(i+ ' - '+ds.hidden);
    ds.hidden = !ds.hidden;
//!ds.hidden =ds.hidden;
//console.log(i+ ' - '+ds.hidden);
//ds.hidden=true;



  });
  chart2.update();
});


}


// Request data using D3
d3
//  .csv("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2814973/atp_wta.csv")
  .csv("./frontend_helpers/output_onepoint.txt")
  .then(makeChart);

//var ctx = document.getElementById("chart").getContext("2d");



function update(selectedVar) {
// Request data using D3
//var newfile= "
d3
//  .csv("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2814973/atp_wta.csv")
  .csv("./frontend_helpers/output_onepoint"+selectedVar+".txt")
  .then(makeChart);
}
/*
$("#toggle").click(function() {
	 chart2.data.datasets.forEach(function(ds) {
    ds.hidden = !ds.hidden;
  });
  chart2.update();
});
*/
/*
$("#toggle").click(function() {
//        alert('test');
console.log("test");
console.log(chart);
console.log(ctx);
console.log(players);

  });
*/

//drawing balance line chart
//var ctx = document.getElementById("chart").getContext("2d");
//window.myLine = new Chart(ctx, config);

/*
$("#toggle").click(function() {
	 window.myLine.data.datasets.forEach(function(ds) {
    ds.hidden = !ds.hidden;
  });
  window.myLine.update();
});
*/


/*
$("#toggle").click(function() {
         chart.data.datasets.forEach(function(ds) {
    ds.hidden = !ds.hidden;
  });
  window.myLine.update();
});
*/


/*
$("#toggle").click(function() {
//	window.chart.data.datasets=true;
//  window.myLine.update();
var chartingo = document.getElementById("chart");
          var ci = chartingo.chart;

          ci.data.datasets.forEach(function(e, i) {
ds.hidden = !ds.hidden;
  });
  ci.update();


});
*/

</script>

</body>
</html>
