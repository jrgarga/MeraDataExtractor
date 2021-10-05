 <?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

        $file = "output_onepoint5.txt";
        $f = fopen($file, "r");

$table_data = "<table class=\"table table-bordered table-striped\">";
$count =0;

        while ( $line = fgets($f) ) {
//        while ( $line = fgets($f, 5) ) {

//            print $line.'</br>';
//            print $line;



$cell_data = explode(",",$line);
$table_data = $table_data."<tr>";
for ($cell_count = 0.0; $cell_count < sizeof($cell_data); $cell_count++) {
  if ($count == 0) {
    $table_data = $table_data."<th>".$cell_data[$cell_count]."</th>";
  } else {
    $table_data = $table_data."<td>".$cell_data[$cell_count]."</td>";
  }
}
$count=$count=1;
$table_data = $table_data."</tr>";
        }

$table_data = $table_data."</table>";

print $table_data;
    ?>
