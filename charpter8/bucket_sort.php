<?php 
require '../charpter2/insertion_sort.php';

function bucket_sort($a) {
    $n = count($a);
    $buckets = array();
    for ($i = 0; $i < $n; $i++) {
        $j = floor($n * $a[$i]);
        echo '<br/>$j = ', $j, ' $i = ', $i, ' $a[$i] = ', $a[$i];
        $buckets[$j] = !isset($buckets[$j]) ? array() : $buckets[$j];
        array_push($buckets[$j], $a[$i]);
    }
    //echo '<pre>'; var_dump($buckets); echo '</pre>';
    $b = array();

    /*foreach ($buckets as $val) {
        echo '<pre>'; var_dump($val); echo '</pre>';
        $val = insertion_sort($val);
        foreach ($val as $v) {
            array_push($b, $v);
        }
    }*/
    foreach ($buckets as $val) {
        echo '<pre>'; var_dump($val); echo '</pre>';
        $val = insertion_sort($val);
        foreach ($val as $v) {
            array_push($b, $v);
        }
    }
    return $b;
}
$arr1 = range(0, 1, 0.14);
$arr2 = range(0, 1, 0.17);
$arr1 = array_merge($arr1, $arr2);
shuffle($arr1);
echo '<pre>'; var_dump($arr1); echo '</pre>';
$arr1 = bucket_sort($arr1, count($arr1));
echo '<pre>'; var_dump($arr1); echo '</pre>';
?>
