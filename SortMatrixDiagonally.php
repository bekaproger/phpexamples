
<?php 

$numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25");
rsort($numbers);

$length = count($numbers);
$next_line = (int)sqrt($length);
$y = 0;
$l = 0;

$z = 0;
$z2 = 1;
$d = 0;
$d2 = 1;

for($x = 0; $x < $length; $x++) {
    if ($y < $next_line) {
        // echo $z . "/" . $l . "-" . $d . "/" . $d2 . "=" . $z2 . ":" .  $numbers[$z + $l];
        echo $numbers[$z + $l];
        echo "\t";

        $y++;

        if ($y < $next_line - $l) {
            $z += $z2;
            $z2++;
        }
        if ($y >= $next_line - $l) {
            $z2--;
            $z += $z2;
        }
    }

    if ($y >= $next_line) {
        $l++;

        $d += $d2;
        $d2++;

        $y = 0;
        $z = $d;
        $z2 = $l + 1;

        echo "\n";
    }
}