<?php 
require '../charpter7/quick-sort.php';

function randomized_select($a, $p, $r, $i) {
    if ($p == $r) {
        return $a[$p];
    }
    $q = randomized_partition($a, $p, $r);
    $k = $q - $p + 1;
    if ($i == $k) {
        return $a[$q];
    } elseif ($i < $k) {
        return randomized_select($a, $p, $q - 1, $i);
    } else {
        return randomized_select($a, $q + 1, $r, $i - $k); 
    }
}

$arr = range(1, 10);
shuffle($arr);
echo '<pre>'; var_dump($arr); echo '</pre>';
$sel = randomized_select($arr, 0, count($arr) - 1, 4);
echo 'select index = 4 and value = ', $sel;

?>
