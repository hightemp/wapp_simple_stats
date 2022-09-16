<?php

namespace Hightemp\WappSimpleStats;

include_once("RedBeanPHP.php");

use RedBeanPHP\Facade as R;

R::setup( 'sqlite:'.ROOT_PATH.'/data/dbfile.db' );

$oStat = R::dispense('stats');
$oStat->import((array) $_SERVER);
R::store($oStat);

$iC = R::count('stats');
$sURL = "https://img.shields.io/badge/statistics-{$iC}-yellowgreen";

header("content-type: image/svg+xml;charset=utf-8");
die(file_get_contents($sURL));