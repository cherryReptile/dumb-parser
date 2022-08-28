<?php

require __DIR__ . '/../vendor/autoload.php';

$arr = [4, 5, 8, 9, 1, 7, 2];

function sortArr(array $arr) : array{
    for ($count = count($arr); $count > 1; $count--) {
        for ($i = 1; $i < $count; $i++) {
            if ($arr[$i] > $arr[0]) {
                array_swap($arr, $i);
            }
            array_swap($arr, $count - 1);
        }
    }
    return $arr;
}

function array_swap(&$arr, $num)
{
    $first = $arr[0];
    $arr[0] = $arr[$num];
    $arr[$num] = $first;
}

dd(sortArr($arr));