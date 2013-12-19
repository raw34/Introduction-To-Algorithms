<?php 
function max_bit($num) {
    $bits = 1;
    while (intval($num / 10)) {
        $bits++;
        $num /= 10;
    }
    return $bits;
}

function counting_sort(&$a, &$b, $k, &$t) {
    $c = range(1, $k);
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
        $b[$c[$t[$i]] - 1] = $a[$i] ;
        $c[$t[$i]]--;
    }
    #echo '<pre>'; var_dump($b); echo '</pre>';
}

function radix_sort(&$a, $n) {
    $t = $b = range(1, $n);
    $d = max_bit(max($a));
    //echo '<br/>最大数字长度 = ', $d;
    $radix = 1;

    for ($i = 0; $i < $d; $i++, $radix *= 10) {
        for ($j = 0; $j < $n; $j++) {
            $t[$j] = $a[$j] / $radix % 10;
        }
        //echo '<pre>'; var_dump($t); echo '</pre>';
        counting_sort($a, $b, max($t), $t);
    }
    $a = $b;
}
$arr1 = range(1, 10);
shuffle($arr1);
echo '<pre>'; var_dump($arr1); echo '</pre>';
radix_sort($arr1, count($arr1));
echo '<pre>'; var_dump($arr1); echo '</pre>';
?>
