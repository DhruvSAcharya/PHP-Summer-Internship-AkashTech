<?php 

$data = stripslashes(file_get_contents("php://input"));

$functn = json_decode($data, true);

$code = '
<?php 
$arr = array(';
 
$code2 = ');
$newarr = '.$functn['fname'].'($arr);';
$code2_2 = ');
echo '.$functn['fname'].'($arr);';
$code3 = '
foreach ($newarr as $key => $value) {
echo "<br/>$key - <strong>$value</strong> ";
}
?>';
$code4 = '
echo $newarr;
?>';
$code5 = '
print_r($newarr);
?>';
$endtag = '
?>';


switch ($functn['type']) {
    case 1:
        echo '<pre>' . htmlspecialchars($code) .
            ' <input class="form-control-sm" type="text" id="arrayvalue" placeholder="Enter values..."> '.
             htmlspecialchars($code2_2) .htmlspecialchars($endtag).'</pre>';
        break;
    case 2:
        echo '<pre>' . htmlspecialchars($code) .
            '  <input class="form-control-sm" type="text" id="arrayvalue" placeholder="Enter values..."> '.
             htmlspecialchars($code2) . htmlspecialchars($code5) . '</pre>';
        break;
    default:
        echo "Error";
        break;
}



?>