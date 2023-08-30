<?php

include "FaceDetector.php";

$detector = new svay\FaceDetector('detection.dat');
$detector->faceDetect('img5.JPG');
$detector->toJpeg();

?>