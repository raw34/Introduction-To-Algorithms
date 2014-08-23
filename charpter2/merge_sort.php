<?php
function merge_sort(&$a, $p, $r) {
    if ($p < $r) {
        $q = intval(($p + $r) / 2);
        //echo '<br/> q = ', $q;
        merge_sort($a, $p, $q);
        merge_sort($a, $q + 1, $r);
        echo "\nmerge(a, $p, $q, $r)";
        merge($a, $p, $q, $r);
    }
}

function merge(&$a, $p, $q, $r) {
    $n1 = $q - $p + 1;
    $n2 = $r - $q;
    //echo "\n", $n1, ' == ', $n2;
    $left = array();
    $right = array();
    for ($i = 0; $i < $n1; $i++) {
        $left[$i] = $a[$p + $i];
    }
    for ($j = 0; $j < $n2; $j++) {
        $right[$j] = $a[$q + $j + 1];
    }
    echo "\nL = ", implode(' ', $left);
    echo "\nR = ", implode(' ', $right);
    $left[$i] = $right[$j] = PHP_INT_MAX;
    $i = $j = 0;
    for ($k = $p; $k <= $r; $k++) {
        if ($left[$i] <= $right[$j]) {
            $a[$k] = $left[$i];
            $i++;
        } else {
            $a[$k] = $right[$j];
            $j++;
        }
    }
    echo "\na = ", implode(' ', $a);
}

$arr = range(1, 10);
shuffle($arr);
echo "input = ", implode(' ', $arr);
merge_sort($arr, 0, 9);
echo "\noutput = ", implode(' ', $arr);
?>
