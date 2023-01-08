#!/usr/bin/env php

<?php

use App\Cli;
use App\GenDiff;

require_once __DIR__ . "/vendor/autoload.php";

$obCli = new Cli();
$arArgs = $obCli->getArgs();
$obGenDiff = new GenDiff();
$strResult = $obGenDiff->getDiffFiles(__DIR__ . "/seeds/file1.json", __DIR__ . "/seeds/file2.json");
file_put_contents("test.txt", print_r($strResult, true));


