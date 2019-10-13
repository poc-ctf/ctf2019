<?php
function gp($chars) {
    $sp = [];
    $countChars = count($chars);
    for ($i = 0; $i < $countChars; $i++) {
        for ($j = 0; $j < $countChars; $j++) {
            $sp[] = $chars[$i] . $chars[$j];
        }
    }

    return $sp;
}
$up = "d0yy6dp0r69wiu5jwfjwbjwxp9n8bzohknjp";
$sp = gp(['b', 'c', 'd', 'f', '2', 'g', '1', 'z', 'h', 'i', '9', 'j', '5', 'k', 'l', 'm', '6', 'n', 'a', 'o', 'p', '3', 'q', 'r', 's', 't', '7', 'u', 'v', '4', 'w', 'x', 'y', '0', 'e', '8']);
$pl = [105, 1184, 578, 753, 844, 390, 351, 443, 1083, 426, 11, 1111, 730, 647, 7, 692, 485, 416, 290, 1152, 1125];
$f = true;

for ($i = 0; $i < count($pl); $i++) {
    echo($sp[$pl[$i]]);
}

for ($i = 0;$i < strlen($up) / 2;$i++) {
    if (array_search($up[$i * 2] . $up[$i * 2 + 1], $sp) != $pl[$i]) {
        $f = false;
    }
}
if ($f) {
    echo 'scs2019{' . $up . '}';
    exit(0);
}
echo "Wrong password";