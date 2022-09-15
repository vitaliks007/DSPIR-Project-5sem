<?php
function shellSort($a)
{   
    $n = count($a);
    for ($step = $n / 2; $step > 0; $step /= 2){
        for ($i = $step; $i < $n; $i++) {
            for ($j = $i - $step; $j >= 0 && $a[$j] > $a[$j + $step]; $j -= $step) {
                $t = $a[$j];
                $a[$j] = $a[$j+$step];
                $a[$j+$step] = $t;
            }
        }
    }

    return $a;

}