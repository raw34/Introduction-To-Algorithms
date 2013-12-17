<?php 
function swap(&$n, &$m) {
    $temp = $n;
    $n = $m;
    $m = $temp;
}

function partition(&$a, $p, $r) {
    $x = $a[$r];
    $i = $p - 1;
    for ($j = $p; $j < $r; $j++) {
        if ($a[$j] < $x) {
            $i++;
            swap($a[$i], $a[$j]);
        }
    }
    $i++;
    swap($a[$i], $a[$r]);
    //echo '<pre>'; var_dump($a); echo '</pre>';
    return $i;
}

function quick_sort(&$a, $p, $r) {
    if ($p < $r) {
        $q = partition($a, $p, $r);
        quick_sort($a, $p, $q - 1);
        quick_sort($a, $q + 1, $r);
    }
}

function randomized_partition(&$a, $p, $r) {
    $i = rand($p, $r);
    swap($a[$r], $a[$i]);
    return partition($a, $p, $r);
}

function randomized_quick_sort(&$a, $p, $r) {
    if ($p < $r) {
        $q = randomized_partition($a, $p, $r);
        //echo '<br/> q = ', $q;
        randomized_quick_sort($a, $p, $q - 1);
        randomized_quick_sort($a, $q + 1, $r);
    }
}

$arr = range(1, 10);
shuffle($arr);
echo '<pre>'; var_dump($arr); echo '</pre>';
#quick_sort($arr, 0, count($arr) - 1);
randomized_quick_sort($arr, 0, count($arr) - 1);
echo '<pre>'; var_dump($arr); echo '</pre>';
?>
