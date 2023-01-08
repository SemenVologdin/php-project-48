<?php

namespace Differ;
use App\GenDiff;

function genDiff( string $strFilePath1, string $strFilePath2 ): string
{
    $obGenDiff = new GenDiff();
    $strResult = $obGenDiff->getDiffFiles($strFilePath1, $strFilePath2);
    return $strResult;
}


