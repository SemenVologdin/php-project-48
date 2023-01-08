#!/usr/bin/env php

<?php

use App\Cli;
use function Differ\genDiff;

require_once __DIR__ . "/vendor/autoload.php";

$obCli = new Cli();
$arArgs = $obCli->getArgs();

$diff = genDiff($arArgs["<firstFile>"], $arArgs["<secondFile>"]);
file_put_contents("test.txt", $diff);
