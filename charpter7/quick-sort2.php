<?php 
function swap(&$n, &$m) {
    $temp = $n;
    $n = $m;
    $m = $temp;
}

function quick_sort(&$a, $p, $r) {
    if ($p < $r) {
        $x = $a[$r];
        $q = $p - 1;
        for ($i = $p; $i < $r; $i++) {
            if ($a[$i] < $x) {
                $q++;
                swap($a[$q], $a[$i]);
            }
        }
        $q++;
        swap($a[$q], $a[$r]);
        quick_sort($a, $p, $q - 1);
        quick_sort($a, $q + 1, $r);
    }
}

function randomized_quick_sort(&$a, $p, $r) {
    if ($p < $r) {
        $i = rand($p, $r);
        swap($a[$r], $a[$i]);
        $x = $a[$r];
        $q = $p - 1;
        for ($i = $p; $i < $r; $i++) {
            if ($a[$i] < $x) {
                $q++;
                swap($a[$q], $a[$i]);
            }
        }
        $q++;
        swap($a[$q], $a[$r]);
        randomized_quick_sort($a, $p, $q - 1);
        randomized_quick_sort($a, $q + 1, $r);
    }
}

$arr = range(1, 10);
shuffle($arr);
echo "\nintput = ", implode(' ', $arr);
//quick_sort($arr, 0, count($arr) - 1);
randomized_quick_sort($arr, 0, count($arr) - 1);
echo "\noutput = ", implode(' ', $arr);
