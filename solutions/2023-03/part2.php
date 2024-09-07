<?php
define ("SCHEMATIC",file("input.dat"));
define("LASTLINEINDEX",count(SCHEMATIC)-1);
define("LASTCHARPOSITION",strlen(SCHEMATIC[0])-1);
function getSurroundingnumbers($line,$position){
    $numbers=[];
    if($line !=  0){ $startLine = $line - 1; } else { $startLine = 0; }
    if($line !=  LASTLINEINDEX){ $endLine = $line+1; } else { $endLine = LASTLINEINDEX; }
    if($position != 0){ $startPosition = $position - 1; } else { $startPosition = 0; }
    if($position != LASTCHARPOSITION ){ $endPosition = $position + 1; } else { $endPosition = LASTCHARPOSITION; }
    $currentLine = $startLine;
    

    return $numbers;
}


$currentLineIndex=0;
$total=0;
while($currentLineIndex <= LASTLINEINDEX){
    $position=0;
    while($position <= LASTCHARPOSITION){
        $char=substr(SCHEMATIC[$currentLineIndex],$position,1);
        if($char == "*"){
            $surroundingNumbers=getSurroundingnumbers($line,$position);
            if(count($surroundingNumbers) == 2){
                $gearRatio = $surroundingNumbers[0] * $surroundingNumbers[1];
                $total += $gearRatio;
            }
        }
        $position++;
    }
    $currentLineIndex++;
}
echo "The Answer for part 2 is : ".$total;
?>
<hr>
<pre><code>
01. define ("SCHEMATIC",file("input.dat"));
02. define("LASTLINEINDEX",count(SCHEMATIC)-1);
03. define("LASTCHARPOSITION",strlen(SCHEMATIC[0])-1);
04. function addPerimiterCharacters($line,$start,$length){
05.     $characters="";
06.     $leftBound=$start-1;
07.     $perimeterLength=$length+2;
08.     if($leftBound < 0){$leftBound = 0; $perimeterLength--;}
09.     $rightBound=$leftBound + $perimeterLength;
10.     if($rightBound >= LASTCHARPOSITION) { $rightBound=LASTCHARPOSITION; $perimeterLength--;}
11.     if($line > 0){$characters .= substr(SCHEMATIC[$line-1], $leftBound, $perimeterLength);}
12.    $characters .= substr(SCHEMATIC[$line], $leftBound, $perimeterLength);
13.    if($line < LASTLINEINDEX){ $characters .= substr(SCHEMATIC[$line+1], $leftBound, $perimeterLength);}
14.    return $characters;
15. }
16. function charsContainSymbol($characters){
17.    $characters=preg_replace("/[0-9,.]/","",$characters);
18.    if(strlen($characters)>0){return TRUE;}
19.    return FALSE;
20. }
21. $currentLineIndex=0;
22. $total=0;
23. while($currentLineIndex <= LASTLINEINDEX){
24.    $position=0;
25.    while($position <= LASTCHARPOSITION){
26.        $char=substr(SCHEMATIC[$currentLineIndex],$position,1);
27.        $length=0;
28.        if(is_numeric($char)){
29.            $startPosition=$position;
30.            $number=$char;
31.            $length++;
32.            $position++;
33.            $nextChar = substr(SCHEMATIC[$currentLineIndex], $position, 1);
34.            while(is_numeric($nextChar)){
35.                $number = ($number * 10) + $nextChar;
36.                $position++;
37.                $length++;
38.                $nextChar = substr(SCHEMATIC[$currentLineIndex], $position, 1);
39.            }
40.            $numberWithPerimeter=addPerimiterCharacters($currentLineIndex,$startPosition,$length);
41.            if(charsContainSymbol($numberWithPerimeter)){
42.                $total+=$number;
43.            }
44.        }
45.        $position++;
46.    }
47.    $currentLineIndex++;
48. }
49. echo "The Answer is : ".$total;
</code></pre>