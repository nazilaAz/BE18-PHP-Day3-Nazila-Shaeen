<?php
function maxArray($myArray)
{
    echo max($myArray);
}

$myArray=[];
    for ($i = 0; $i < 10; $i++) {
        $number = rand(10, 100);
        array_push($myArray,$number);
    }
    echo "<pre>";
    var_dump($myArray); 
    echo "</pre>";

    maxArray($myArray);