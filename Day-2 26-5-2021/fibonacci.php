<?php 
$a=1;
$b =0;
for($i=0;$i<10;$i++){
    $ans = $a + $b; 
    echo  $ans . "<br>";
    $b = $a;
    $a = $ans;
}
?> 