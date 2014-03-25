<?php

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isPica($data) {
    if (preg_match('/^[0-9]+(?i)p([0-1]?[0-9])?$/i',$data)) {
        return true;
    }
    return false;
}

function makePoints($data) {
    $data = preg_replace('/^([0-9]+)((?i)p)(([0-1]?[0-9])?)$/i','$1.$3',$data);
    $data = explode('.',$data);
    $points = floor($data[0] * 12);
    $points = $data[1] + $points;
    return $points;
}

/* todo: Make sure entry is a valid number, maybe test for px, pt, p, ems etc and handle accordingly. */
/* todo: Make calculations for ems and percent. */
if(isset($_POST['submit'])) {
    $base = validate($_POST['base']);
    $alt = validate($_POST['alt']);
    $ratio = validate($_POST['ratio']);

    if (isPica($base)) {
        $basePoints = makePoints($base);
    } else {
        $basePoints = $base;
    }

    if (isPica($alt)) {
        $altPoints = makePoints($alt);
    } else {
        $altPoints = $alt;
    }

} else {
    $ratio = 1.618;
    $basePoints = 16;
    $altPoints = 960;
    $base = $basePoints;
    $alt = $altPoints;
}

if($altPoints >= 1600) {
    $max = $altPoints;
} else {
    $max = 1600;
}

$i=$basePoints;
while ($i >= 1) {
    $baseScale[] =  round($i,1);
    $i = $i / $ratio;
}
$baseScale = array_reverse($baseScale);
$i=$basePoints;
while ($i <= $max) {
    $i = $i * $ratio;
    $baseScale[] =  round($i,1);
}

$i=$altPoints;
while ($i >= 1) {
    $altScale[] =  round($i,1);
    $i = $i / $ratio;
}
$altScale = array_reverse($altScale);
$i=$altPoints;
while ($i <= $max) {
    $i = $i * $ratio;
    $altScale[] =  round($i,1);
}

$altScale = new ArrayIterator($altScale);
$baseScale = new ArrayIterator($baseScale);

$scale = new MultipleIterator();
$scale->attachIterator($baseScale);
$scale->attachIterator($altScale);