<?php

$outputFileName = "blah";
ob_start();
include "HxH INY 1.php";
$htmlFile = fopen($outputFileName.'.html', 'w');
fwrite($htmlFile, ob_get_clean());
fclose($htmlFile);


$cmd =   "\"".realpath(__DIR__ . "/src/wkhtmltopdf.exe")."\" ".
  "\"".realpath(__DIR__) . "\\{$outputFileName}.html"."\" ".
  "\"".realpath(__DIR__) . "\\{$outputFileName}.pdf"."\" ";
exec($cmd);


realpath(__DIR__ . "\\{$outputFileName}.pdf");

?>