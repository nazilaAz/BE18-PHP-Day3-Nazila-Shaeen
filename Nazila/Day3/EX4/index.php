<?php
for ($i = 1; $i <= 100; $i++) {
    for ($j = 1; $j <= 100; $j++) {
        $multi = $i * $j;
        $modThree = $multi % 3;
        $modfive = $multi % 5;

        if($modThree == 0 && $modfive == 0){
            echo "Full-Stack </br>";
        }elseif ($modThree == 0) {
            echo "Back-End </br>";
        } elseif ($modfive == 0) {
            echo "Front-End </br>";
        }else
         {
            echo $multi . "</br>";
        }
    }
}
