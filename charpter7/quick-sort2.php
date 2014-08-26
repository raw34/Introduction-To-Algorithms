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
        echo "\nx = $x p = $p q = $q r = $r";
        echo "\ni = ", implode(' ', $a);
        for ($i = $p; $i < $r; $i++) {
            if ($a[$i] < $x) {
                $q++;
                swap($a[$q], $a[$i]);
            }
        }
        $q++;
        swap($a[$q], $a[$r]);
        echo "\nx = $x p = $p q = $q r = $r";
        echo "\no = ", implode(' ', $a);
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

$arr = range(1, 8);
shuffle($arr);
$arr = explode(' ', '4 1 3 6 5 8 2 7');
//$arr = range(1, 8);
//$arr = range(8, 1);
echo "\nintput = ", implode(' ', $arr);
quick_sort($arr, 0, count($arr) - 1);
///randomized_quick_sort($arr, 0, count($arr) - 1);
echo "\noutput = ", implode(' ', $arr);

/*
 intput = 4 9 3 6 5 8 2 7 10 1
i = 4 9 3 6 5 8 2 7 10 1
o = 1 9 3 6 5 8 2 7 10 4
i = 1 9 3 6 5 8 2 7 10 4
o = 1 3 2 4 5 8 9 7 10 6
i = 1 3 2 4 5 8 9 7 10 6
o = 1 2 3 4 5 8 9 7 10 6
i = 1 2 3 4 5 8 9 7 10 6
o = 1 2 3 4 5 6 9 7 10 8
i = 1 2 3 4 5 6 9 7 10 8
o = 1 2 3 4 5 6 7 8 10 9
i = 1 2 3 4 5 6 7 8 10 9
o = 1 2 3 4 5 6 7 8 9 10
output = 1 2 3 4 5 6 7 8 9 10
 */
