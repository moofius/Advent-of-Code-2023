<!DOCTYPE html>
<html>
    <head>
        <title>Day 1 Part2 2023</title>
        <style>
            pre{
                padding:2ch 3ch 3ch;
                background:black;
                color:white;
                border-radius:5px;
                display:inline-block;
            }
        </style>
    </head>
    <body>
    <a href='https://adventofcode.com/2023/day/1'>https://adventofcode.com/2023/day/1</a>
<?php
define ("lines",file("input.dat"));
function createKey($text){
     $numbers=preg_replace("/[^0-9]/", "", $text);
     return substr($numbers,0,1)*10+substr($numbers,-1);
}
function numberfy($text){
    $words=["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
    $numbers=["o1e", "t2o", "t3e", "4", "5e", "6", "7n", "e8t", "n9e"];
    return str_replace($words,$numbers,$text);
}
$total1=0;
foreach(lines as $line){
    $line=numberfy($line);
    $total+=createKey($line);
}
echo "<br>ANSWER FOR DAY 1 PART 2 IS ".$total;
?>
<hr>
<pre style=''><code>
 1. <span style='color:rgb(250,250,0);font-weight:400;'>define</span> ("lines",<span style='color:rgb(250,250,0);font-weight:400;'>file</span>("input.dat"));
 2. <span style='color:rgb(100,100,255);font-weight:600;'>function</span> <span style='color:rgb(250,250,0);font-weight:400;'>createKey</span>($text){
 3.    $numbers=<span style='color:rgb(250,250,0);font-weight:400;'>preg_replace</span>("/[^0-9]/", "", $text);
 4.    <span style='color:rgb(200,0,250);font-weight:600;'>return</span> <span style='color:rgb(250,250,0);font-weight:400;'>substr</span>($numbers,0,1)*10 + <span style='color:rgb(250,250,0);font-weight:400;'>substr</span>($numbers,-1);
 5. }
 6. <span style='color:rgb(100,100,255);font-weight:600;'>function</span> <span style='color:rgb(250,250,0);font-weight:400;'>numberfy</span>($text){
 7.   $words=["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
 8.   $numberSubs=["o1e", "t2o", "t3e", "4", "5e", "6", "7n", "e8t", "n9e"];
 9.   <span style='color:rgb(200,0,250);font-weight:600;'>return</span> <span style='color:rgb(250,250,0);font-weight:400;'>str_replace</span>($words,$numberSubs,$text);
10. }
11. $total=0;
12. <span style='color:rgb(200,0,250);font-weight:600;'>foreach</span>(lines as $line){
13.    $line=<span style='color:rgb(250,250,0);font-weight:400;'>numberfy</span>($line);
14.    $total+=<span style='color:rgb(250,250,0);font-weight:400;'>createKey</span>($line);
15. }
16. <span style='color:rgb(250,250,0);font-weight:400;'>echo</span> "ANSWER FOR DAY 1 PART 2 IS ".$total;
</code></pre>

</body>
</html>