<?php
$yenicmd='ps aux | grep \'WEBSERVER\' | grep -v grep| awk \'{print $2}\' ';
$command = shell_exec($yenicmd);

$yenicmd='ps aux | grep \'VComp\' | grep -v grep| awk \'{print $2}\' ';
$command2 = shell_exec($yenicmd);

$yenicmd='ps aux | grep \'Temp\' | grep -v grep| awk \'{print $2}\' ';
$command3 = shell_exec($yenicmd);

$yenicmd='ps aux | grep \'UComp\' | grep -v grep| awk \'{print $2}\' ';
$command4 = shell_exec($yenicmd);

$yenicmd='ps aux | grep \'DNI\' | grep -v grep| awk \'{print $2}\' ';
$command5 = shell_exec($yenicmd);

$yenicmd='ps aux | grep \'Press\' | grep -v grep| awk \'{print $2}\' ';
$command6 = shell_exec($yenicmd);

$yenicmd='ps aux | grep \'Soil\' | grep -v grep| awk \'{print $2}\' ';
$command7 = shell_exec($yenicmd);

if ($command!=NULL or $command2!=NULL or $command3!=NULL or $command4!=NULL or $command5!=NULL or $command6!=NULL or $command7!=NULL)
{
$able=0;
}
else
{
$able=1;
}

echo $able;
?>

