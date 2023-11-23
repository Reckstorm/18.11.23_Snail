<?php
//    $currentDay = 18;
//    $currentMonth = 11;
//    $currentYear = 2023;
//
//    $seconds = 2000000000;
//    echo "Seconds: ".$seconds."<br>";
////    $daysAll = $seconds / 24 / 60 / 60;
//    $daysAll = intdiv($seconds, 24);
//    $daysAll = intdiv($daysAll, 60);
//    $daysAll = intdiv($daysAll, 60);
//
//    $years = intdiv($daysAll, 365);
//    $months = intdiv(($daysAll % 365), 30);
//    $days = $daysAll - $years * 365 - $months * 30;
//    $resultStr = "Final date: ".$days.".".$months.".".$years."<br>";
//
//    if ($currentDay <= $days && $currentMonth <= $months && $currentYear <= $years)
//        echo "<p style='background-color:green;'>$resultStr</p>";
//    else
//        echo "<p style='background-color:red;'>$resultStr</p>";
//
//$color = array ("white", "yellow", "red", "orange", "blue","green");
//
//echo "<table>";
//    for ($i = 0; $i < 6; $i++)
//    {
//        echo "<tr>";
//        for ($j = 0; $j < 6; $j++)
//        {
//            $num = rand(0,5);
//            echo "<td style='background-color:$color[$num]; width: 50px; height: 50px'></td>";
//        }
//        echo "</tr>";
//    }
//echo "</table>";
//echo "<br>";

$limit = 5;
$limitTemp = $limit;

$full = 255;
$red = 0;
$green = 0;
$blue = 0;

$matrix = array();
$colourMatrix = array();

for ($i = 0; $i < $limit; $i++) {
    $matrix[] = array();
    for ($j = 0; $j < $limit; $j++) {
        $matrix[$i][] = "";
    }
}

for ($i = 0; $i < $limit * $limit; $i++) {
    $red += $full / ($limit * $limit);
    $green += $full / ($limit * $limit);
    $blue += $full / ($limit * $limit);
    $colourRGB = "rgb($red, $green, $blue)";
    $colourMatrix[] = $colourRGB;
}

$f = true;
$count = 1;
$x = 0;
$y = 0;
$xLim = 0;
$decLim = 0;
$counter = 0;

$temp = 5;

while ($limitTemp) {
    if ($f) {
        while (($x + $y) < $limitTemp * 2 - 1) {
            $matrix[$y][$x] = "<div style='background-color:" . $colourMatrix[$counter]. "; color: white; width: 50px; height: 50px'></div>";
            if ($x < $limitTemp - 1) {
                $x++;
            } else {
                $y++;
            }
            $counter++;
        }
        $y--;
        $x--;
        $limitTemp--;
        $f = false;
    } else {
        while (($y + $x) > $decLim) {
            $matrix[$y][$x] = "<div style='background-color:" . $colourMatrix[$counter]. "; color: white; width: 50px; height: 50px'></div>";
            if ($x > $xLim) {
                $x--;
            } else {
                $y--;
            }
            $counter++;
        }
        $y++;
        $x++;
        $xLim++;
        $decLim += 2;
        $f = true;
    }
}


echo "<table>";
for ($i = 0; $i < $limit; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $limit; $j++) {
        echo "<td>" . $matrix[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";