<?php
function Palindrome($num){
	$temp = $num;
	$sum = 0;
	while (floor($temp)) {
		$rem = $temp % 10;
		$sum = $sum * 10 + $rem;
		$temp = $temp/10;
	}
	if ($sum == $num){
		return 1;
	}
	else{
		return 0;
	}
}
$input = 14541;
if (Palindrome($input)){
	echo "Palindrome";
}
else {
echo "Not a Palindrome";
}
?>
