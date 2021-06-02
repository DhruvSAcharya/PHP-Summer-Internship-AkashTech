<?php 

$data = stripslashes(file_get_contents("php://input"));

$values = json_decode($data, true);

$data2 = $values['arrayvalue'];

$fname = $values['fname'];

$arr = explode(',', $data2);

switch ($fname) {
    case 'count':
        echo count($arr);
        break;

    case 'array_count_values':
        $newarr = array_count_values($arr);
        echo '<pre>';
        print_r($newarr);
        echo '</pre>';
        break;

    case 'array_sum':
        echo array_sum($arr);
        break;

    case 'array_product':
        echo array_product($arr);
        break;
    case 'array_reverse':
        $revarr = array_reverse($arr);
        echo '<pre>';
        print_r($revarr);
        echo '</pre>';
        break;
    case 'array_unique':
        echo '<pre>';
        print_r(array_unique($arr));
        echo '</pre>';
        break;
    case 'sort':
        sort($arr);
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        break;
    case 'rsort':
        rsort($arr);
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        break;
    case 'asort':
        asort($arr);
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        break;
    
    default:
        echo "Error";
        break;
}





// print_r($value);


// echo '<br>'.$values['arrayvalue'];


?>