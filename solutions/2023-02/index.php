<!DOCTYPE html>
<html>
    <head>
        <title>Day 2 Part2 2023</title>
        <style>
            pre{
                padding:2ch 3ch 3ch;
                background:black;
                color:white;
                border-radius:5px;
                display:inline-block;
                line-height:1.5;
            }

            p{
                display:inline-block;
                margin:0;
            }
            .b{
                color:rgb(100,100,255);font-weight:600;
            }
            .y{
                color:rgb(250,250,0);font-weight:400;
            }
            .p{
                color:rgb(200,0,250);font-weight:600;
            }
        </style>
    </head>
    <body>
    <a href='https://adventofcode.com/2023/day/2'>https://adventofcode.com/2023/day/2</a><br>
<?php
define ("games" , file("input.dat"));
define("max",["red"=>12,"green"=>13,"blue"=>14]);
$totalPart1=0;
$totalPart2=0;
foreach(games as $game){
    $failed = FALSE;
    $gameProperties = explode(":" , $game);
    $id = explode(" " , $gameProperties[0])[1];
    $sets = explode(";" , $gameProperties[1]);
    foreach($sets as $set){
        $cubes = explode("," , $set);
        foreach($cubes as $cube){
            $cubeProperties = explode(" " , trim($cube));
            $color = $cubeProperties[1];
            $qty = $cubeProperties[0];
            if($qty > max[$color]){$failed = TRUE;}
            if(!isset($min[$color]) || $min[$color] < $qty){ $min[$color] = $qty;}
        }
    }
    $totalPart2 += $min['red'] * $min['green'] * $min['blue'];
    unset($min);
    if(!$failed){$totalPart1 += $id;}
}
echo "The Answer for Part One Is : " . $totalPart1 . "<br>";
echo "The Answer for Part Two Is : " . $totalPart2 . "<hr>";
?>
<hr>
<pre><code>
 1. <p class='y'>define</p> ("games" , file("input.dat"));
 2. <p class='y'>define</p>("max" , ["red" => 12 , "green" => 13 , "blue" => 14]);
 3. $totalPart1 = 0;
 4. $totalPart2 = 0;
 5. <p class='p'>foreach</p>(games as $game){
 6.   $failed = FALSE;
 7.   $gameProperties = <p class='y'>explode</p>(":" , $game);
 8.   $id = <p class='y'>explode</p>(" " , $gameProperties[0])[1];
 9.   $sets = <p class='y'>explode</p>(";" , $gameProperties[1]);
10.   <p class='p'>foreach</p>($sets as $set){
11.     $cubes = <p class='y'>explode</p>("," , $set);
12.     <p class='p'>foreach</p>($cubes as $cube){
13.       $cubeProperties = <p class='y'>explode</p>(" " , trim($cube));
14.       $color = $cubeProperties[1];
15.       $qty = $cubeProperties[0];
16.       <p class='p'>if</p>($qty > <p class='y'>max</p>[$color]){ $failed = TRUE; }
17.       <p class='p'>if</p>(!<p class='y'>isset</p>($min[$color]) <p class='y'>||</p> $min[$color] < $qty){ $min[$color] = $qty; }
18.     }
19.   }
20.   $totalPart2 += $min['red'] * $min['green'] * $min['blue'];
21.   <p class='y'>unset</p>($min);
22.   <p class='p'>if</p>(!$failed){ $totalPart1 += $id; }
23. }
24. <p class='y'>echo</p> "The Answer for Part One Is : " . $totalPart1 . "&lt;br>";
25. <p class='y'>echo</p> "The Answer for Part Two Is : " . $totalPart2 . "&lt;hr>";
</code></pre>
