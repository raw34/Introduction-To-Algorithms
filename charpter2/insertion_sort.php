<?php 
function insertion_sort($a) {
    for ($i = 1, $len = count($a); $i < $len; $i++) {
        $key = $a[$i]; 
        $j = $i - 1;
        while ($j > -1 && $a[$j] > $key) {
            $a[$j + 1] = $a[$j];
            $j--;
        }
        $a[$j + 1] = $key;
    }
    return $a;
}

/*
$arr = range(1, 10);
shuffle($arr);
echo '<pre>'; var_dump($arr); echo '</pre>';
$arr = insertion_sort($arr);
echo '<pre>'; var_dump($arr); echo '</pre>';
 */
?>
