<?php

if(isset($_POST['submit'])) {
    $base = $_POST['base'];
    $alt = $_POST['alt'];
    $ratio = $_POST['ratio'];
}
else {
    $ratio = 1.618;
    $base = 16;
    $alt = 960;
}

$i=$base;
while ($i >= 1) { // Output values from 0 to 10
    $baseScale[] =  round($i,1);
    $i = $i / $ratio;
}
$baseScale = array_reverse($baseScale);
$i=$base;
while ($i <= $alt) { // Output values from 0 to 10
    $i = $i * $ratio;
    $baseScale[] =  round($i,1);
}

$i=$alt;
while ($i >= 1) { // Output values from 0 to 10
    $altScale[] =  round($i,1);
    $i = $i / $ratio;
}
$altScale = array_reverse($altScale);

$altScale = new ArrayIterator($altScale);
$baseScale = new ArrayIterator($baseScale);

$scale = new MultipleIterator();
$scale->attachIterator($baseScale);
$scale->attachIterator($altScale);