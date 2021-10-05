<html>
</head>
<script type="text/javascript">

var interesting ='';
function update(selectedVar) {
interesting=selectedVar;
document.getElementById('indir').href="./frontend_helpers/output_onepoint"+interesting+".txt";
}
function what(){
return interesting;
}

/*
console.log(selectedVar);

Ajax(selectedVar);
        function Ajax(x)
        {
if x=
	console.log('hicmi gelmen');
	console.log(x);

            var
                $http,
                $self = arguments.callee;

            if (window.XMLHttpRequest) {
                $http = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                try {
                    $http = new ActiveXObject('Msxml2.XMLHTTP');
                } catch(e) {
                    $http = new ActiveXObject('Microsoft.XMLHTTP');
                }
            }

            if ($http) {
                $http.onreadystatechange = function()
                {
                    if (/4|^complete$/.test($http.readyState)) {
                        document.getElementById('ReloadThis').innerHTML = $http.responseText;
//                        document.getElementById('ReloadThisAsWell').innerHTML = $http.responseText;

                        setTimeout(function(){$self();}, 1000);
                    }
                };
		console.log('burdasin');
		console.log(x);
                $http.open('GET', 'loadtext_onepoint'+x+'.php' + '?' + new Date().getTime(), true);
		console.log('ve burdasin');
                $http.send(null);
            }

        }
}
*/

        function Ajax()
        {
	    var dahadainteresting=what();
            var
                $http,
                $self = arguments.callee;

            if (window.XMLHttpRequest) {
                $http = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                try {
                    $http = new ActiveXObject('Msxml2.XMLHTTP');
                } catch(e) {
                    $http = new ActiveXObject('Microsoft.XMLHTTP');
                }
            }

            if ($http) {
                $http.onreadystatechange = function()
                {
                    if (/4|^complete$/.test($http.readyState)) {
                        document.getElementById('ReloadThis').innerHTML = $http.responseText;
//                        document.getElementById('ReloadThisAsWell').innerHTML = $http.responseText;

                        setTimeout(function(){$self();}, 1000);
                    }
                };
                $http.open('GET', './frontend_helpers/loadtext_onepoint'+dahadainteresting+'.php' + '?' + new Date().getTime(), true);
                $http.send(null);
            }

        }

//function update(selectedVar) {
// Request data using D3
//var newfile= "
//d3
//  .csv("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2814973/atp_wta.csv")
//  .csv("output_onepoint"+selectedVar+".txt")
//  .then(makeChart);
//}

    </script>


  <title>MERA Grib Data Extraction - Live Output [Tabular From]</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<button onclick="update('')">Januray</button>
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
<button onclick="update('12')">December</button>
</center>

<div id="top"></div>
  <div class="container">
<center><font color=red>this page refreshes itself every minute</font></center>
   <div class="table-responsive">
   <b><h1 align="center">Live Output</h1></br>

<font size=3>
<center><a href="#bottom">Go Bottom</a>&nbsp &nbsp &nbsp &nbsp<a href="graph_multipoint_2020_year.php" target=_blank>Go to Graph View</a>&nbsp &nbsp &nbsp &nbsp
<a href="../" target=_blank>Return to Main Page</a></br>
</font>
</br>
<!--
<form action="downloadFile.php" method="post">
<input type="submit" name="submit" value="Download File (Current Version)" />
</form>
-->

 <a id="indir" name="indir" href="./frontend_helpers/output_onepoint.txt" download><button  type="button">Direct Download</br> (Current Version in TXT format)</button></a>
 <a href="../../files" target=_blank><button  type="button">Check Exported CSVs</br> (Current Version in CSV format)</button></a>
</b>

</center>

    <br />
    <div align="center">


<progress id="file" max="100" value="0">test </progress></br>
<label id="test"></label>

 <div id="ReloadThis"> Default text </div>

    </div>
    <br />
    <div id="employee_table">
    </div>
   </div>
  </div>




 <script type="text/javascript">


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
else if (parseInt(data)<0)
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





        setTimeout(function() {Ajax();}, 1000);
    </script>
<!--    <div id="ReloadThis">Default text</div>-->


<center><div id="bottom"><a href="#top"><font size=3><b>Go Top</b></font></div></center></br></br>
</body>
</html>
