<?php

use BarcodeBakery\Barcode\BCGcode128;
use BarcodeBakery\Common\BCGColor;
use BarcodeBakery\Common\BCGDrawing;

//require __DIR__ . '/vendor/autoload.php';

//require_once('./packages/barcode-common/src/BCGColor.php');

header('Content-Type: image/png');

$colorFront = new BCGColor(0, 0, 0);
$colorBack = new BCGColor(255, 255, 255);
$font = new BCGFontFile(__DIR__ . '/font/Arial.ttf', 18);

$code = new BCGcode128();
$code->setScale(2); // Resolution
$code->setThickness(30); // Thickness
$code->setForegroundColor($colorFront); // Color of bars
$code->setBackgroundColor($colorBack); // Color of spaces
$code->setFont($font); // Font (or 0)
$code->parse('HELLO'); // Text