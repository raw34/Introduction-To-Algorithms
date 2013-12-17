<?php 
function counting_sort(&$a, &$b, $k) {
    $c = range(1, $k);
    $size = count($a);
    for ($i = 0; $i <= $k; $i++) {
        $c[$i] = 0; 
    }
    for ($i = 0; $i < $size; $i++) {
        $c[$a[$i]]++;
    }
    for ($i = 1; $i <= $k; $i++) {
        $c[$i] = $c[$i] + $c[$i - 1];
    }
    for ($i = $size - 1; $i >= 0; $i--) {
        $b[$c[$a[$i]] - 1] = $a[$i] ;
        $c[$a[$i]]--;
    }
}

$arr1 = range(1, 10);
$arr2 = range(1, 10);
shuffle($arr1);
echo '<pre>'; var_dump($arr1); echo '</pre>';
counting_sort($arr1, $arr2, max($arr1));
echo '<pre>'; var_dump($arr2); echo '</pre>';
?>
