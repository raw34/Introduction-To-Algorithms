<?php 
function _parent($i) {
    return floor($i / 2);
}

function _left($i) {
    return $i * 2;
}

function _right($i) {
    return $i * 2 + 1;
}

function swap(&$n, &$m) {
    $temp = $n;
    $n = $m;
    $m = $temp;
}

function max_heapify(&$a, $heap_size, $i) {
    $l = _left($i);
    $r = _right($i);
    if ($l < $heap_size && $a[$l] > $a[$i]) {
        $largest = $l;
    } else {
        $largest = $i; 
    }
    if ($r < $heap_size && $a[$r] > $a[$largest]) {
        $largest = $r;
    }
    if ($largest != $i) {
        swap($a[$largest], $a[$i]);
        max_heapify($a, $heap_size, $largest);
    }
}

function build_max_heap(&$a, $size) {
    for ($i = ($size - 2) / 2; $i >= 0; $i--) {
        max_heapify($a, $size, $i); 
    }
}

function heap_sort(&$a, $size) {
    build_max_heap($a, $size);
    for ($i = $size - 1; $i >= 0; $i--) {
        swap($a[0], $a[$i]);
        $size--;
        max_heapify($a, $size, 0);
    }
}

$arr = range(1, 10);
shuffle($arr);
echo '<pre>'; var_dump($arr); echo '</pre>';
heap_sort($arr, count($arr));
echo '<pre>'; var_dump($arr); echo '</pre>';
?>
