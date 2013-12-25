<?php 
require '../charpter2/insertion_sort.php';

function bucket_sort($a, $max) {
    $n = count($a);
    $m = $n * $max + 1;
    $buckets = array();
    for ($i = 0; $i < $n; $i++) {
        $j = floor($n * $a[$i]);
        //echo '<br/>$j = ', $j, ' $i = ', $i, ' $a[$i] = ', $a[$i];
        $buckets[$j] = !isset($buckets[$j]) ? array() : $buckets[$j];
        array_push($buckets[$j], $a[$i]);
    }
    $b = array();
    for ($i = 0; $i < $m; $i++) {
        //echo '<br/>$i =', $i;
        if (isset($buckets[$i])) {
            //echo ' bucket = ', implode(',', $buckets[$i]);
            foreach ($buckets[$i] as $value) {
                $value = insertion_sort($value);
                array_push($b, $value);
            }
        }
    }
    return $b;
}
$arr1 = range(0, 1, 0.14);
$arr2 = range(0, 1, 0.17);
$arr1 = array_merge($arr1, $arr2);
//$arr1 = range(1, 10);
shuffle($arr1);
echo '<pre>'; var_dump($arr1); echo '</pre>';
$arr1 = bucket_sort($arr1, max($arr1));
echo '<pre>'; var_dump($arr1); echo '</pre>';
?>
