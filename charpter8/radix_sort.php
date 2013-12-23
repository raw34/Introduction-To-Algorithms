<?php 
require 'counting_sort.php';

function max_bit($num) {
    $bits = 1;
    while (intval($num / 10)) {
        $bits++;
        $num /= 10;
    }
    return $bits;
}

function radix_sort(&$a, $n) {
    $t = $b = range(1, $n);
    $d = max_bit(max($a));
    $radix = 1;

    for ($i = 0; $i < $d; $i++, $radix *= 10) {
        for ($j = 0; $j < $n; $j++) {
            $t[$j] = $a[$j] / $radix % 10;
        }
        //echo '<pre>'; var_dump($t); echo '</pre>';
        counting_sort($a, $b, max($t), $t);
    }
}
$arr1 = range(1, 10);
shuffle($arr1);
echo '<pre>'; var_dump($arr1); echo '</pre>';
radix_sort($arr1, count($arr1));
echo '<pre>'; var_dump($arr1); echo '</pre>';
?>
