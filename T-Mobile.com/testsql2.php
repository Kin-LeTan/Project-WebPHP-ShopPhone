<?php
$i = array(8,9,2,5,5);
$s = array(0,0,0,0,0);
$total = $i[0]+$i[1]+$i[2]+$i[3]+$i[4];
for($t=0;$t<=4;$t++){
$i[$t] = $i[$t]/($total)*100;
echo $i[$t]."<br>";
}
?>