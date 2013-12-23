<?php 
function counting_sort(&$a, &$b, $k, &$t = null) {
    $c = range(1, $k);
    $t = $t == null ? $a : $t;
    $size = count($t);
    for ($i = 0; $i <= $k; $i++) {
        $c[$i] = 0; 
    }
    for ($i = 0; $i < $size; $i++) {
        $c[$t[$i]]++;
    }
    for ($i = 1; $i <= $k; $i++) {
        $c[$i] = $c[$i] + $c[$i - 1];
    }
    for ($i = $size - 1; $i >= 0; $i--) {
        $b[$c[$t[$i]] - 1] = $a[$i];
        $c[$t[$i]]--;
    }
    $a = $b;
    //echo '<pre>'; var_dump($b); echo '</pre>';
}

$arr1 = range(1, 10);
$arr2 = range(1, 10);
shuffle($arr1);
echo '<pre>'; var_dump($arr1); echo '</pre>';
counting_sort($arr1, $arr2, max($arr1));
echo '<pre>'; var_dump($arr2); echo '</pre>';
?>
