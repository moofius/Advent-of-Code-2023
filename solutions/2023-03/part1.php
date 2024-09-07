<?php
define ("SCHEMATIC",file("input.dat"));
//we need to remove 1 from lengths and counts as indexing starts at 0
define("LASTLINEINDEX",count(SCHEMATIC)-1);
define("LASTCHARPOSITION",strlen(SCHEMATIC[0])-1);
function addPerimiterCharacters($line,$start,$length){
    $characters="";
    $leftBound=$start-1;
    //the perimeter is 2 chars bigger -1 to left, +1 to right.
    $perimeterLength=$length+2;
    //perimeter starts to left - if object is at start of line, start position is 0, and preimter length is 1 char shorter;
    if($leftBound < 0){$leftBound = 0; $perimeterLength--;}
    $rightBound=$leftBound + $perimeterLength;
    //if we are at end of line, we need to end at last position and perimiter is one char shorter
    if($rightBound >= LASTCHARPOSITION) { $rightBound=LASTCHARPOSITION; $perimeterLength--;}
    //if we are not at top, do line above
    if($line > 0){$characters .= substr(SCHEMATIC[$line-1], $leftBound, $perimeterLength);}
    //do current line
    $characters .= substr(SCHEMATIC[$line], $leftBound, $perimeterLength);
    //if not at bottom add next line
    if($line < LASTLINEINDEX){ $characters .= substr(SCHEMATIC[$line+1], $leftBound, $perimeterLength);}
    return $characters;
}
function charsContainSymbol($characters){
    $characters=preg_replace("/[0-9,.]/","",$characters);
    if(strlen($characters)>0){return TRUE;}
    return FALSE;
}

$currentLineIndex=0;
$total=0;
while($currentLineIndex <= LASTLINEINDEX){
    $position=0;
    while($position <= LASTCHARPOSITION){
        $char=substr(SCHEMATIC[$currentLineIndex],$position,1);
        $length=0;
        if(is_numeric($char)){
            $startPosition=$position;
            $number=$char;
            $length++;
            $position++;
            $nextChar = substr(SCHEMATIC[$currentLineIndex], $position, 1);
            while(is_numeric($nextChar)){
                $number = ($number * 10) + $nextChar;
                $position++;
                $length++;
                $nextChar = substr(SCHEMATIC[$currentLineIndex], $position, 1);
            }
            $numberWithPerimeter=addPerimiterCharacters($currentLineIndex,$startPosition,$length);
            if(charsContainSymbol($numberWithPerimeter)){
                $total+=$number;
            }
        }
        $position++;
    }
    $currentLineIndex++;
}
echo "The Answer is : ".$total;
//PART2




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