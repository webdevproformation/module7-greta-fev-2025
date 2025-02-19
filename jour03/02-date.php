<?php

use Carbon\Carbon;

require_once "vendor/autoload.php";

// composer require nesbot/carbon
// https://carbon.nesbot.com/
// -> ->
$date = Carbon::createFromDate(2025,1,12);
echo  $date->locale("fr")->isoFormat("D MMMM YYYY");
echo "\n";
echo  $date->locale("en")->isoFormat("D MMMM YYYY");
echo "\n";
echo  $date->locale("de")->isoFormat("D MMMM YYYY");
echo "\n";
echo  $date->locale("ru")->isoFormat("D MMMM YYYY"); 
echo "\n";
echo  $date->locale("ar")->isoFormat("D MMMM YYYY"); // arabe
echo "\n";
echo  $date->locale("ja")->isoFormat("D MMMM YYYY"); // japonais