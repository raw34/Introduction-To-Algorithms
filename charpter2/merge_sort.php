<?php
function merge_sort(&$a, $p, $r) {
    if ($p < $r) {
        $q = ($p + $r) / 2;
        /*$a = merge_sort($a, $p, $q);
        $a = merge_sort($a, $q + 1, $r);
        $a = merge($a, $p, $q, $r);
        return $a;
         */
        merge_sort($a, $p, $q);
        merge_sort($a, $q + 1, $r);
        merge($a, $p, $q, $r);
    }
}

function merge(&$a, $p, $q, $r) {
    $n1 = $q - $p + 1;
    $n2 = $r - $q;
    //echo '<br/>', $n1, '=', $n2;
    $left = array();
    $right = array();
    for ($i = 0; $i < $n1; $i++) {
        $left[$i] = $a[$p + $i];
    }
    for ($j = 0; $j < $n2; $j++) {
        $right[$j] = $a[$q + $j + 1];
    }
    $left[$n1] = $right[$n2] = PHP_INT_MAX;
    $i = $j = 0;
    for ($k = $p; $k < $r; $k++) {
        if ($left[$i] <= $right[$j]) {
            $a[$k] = $left[$i++];     
        } else {
            $a[$k] = $right[$j++];
        }
    }
    //return $a;
}

$arr = range(1, 10);
shuffle($arr);
echo '<pre>'; var_dump($arr); echo '</pre>';
$arr = merge_sort($arr, 0, 10);
echo '<pre>'; var_dump($arr); echo '</pre>';
?>
