<?php

namespace App;

class GenDiff
{
    public function __construct()
    {
    }

    public function getDiffFiles( ?string $strPath1, ?string $strPath2 ): string
    {
        $arJsonData1 = $this->getJsonData($strPath1);
        $arJsonData2 = $this->getJsonData($strPath2);

        $arResult = array();

        $arKeys = array_merge(array_keys($arJsonData1), array_keys($arJsonData2));
        $arKeys = array_unique($arKeys);
        usort($arKeys, function($a, $b){
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        });

        foreach ($arKeys as $strKey){
            $mixValue1 = $arJsonData1[$strKey];
            $mixValue2 = $arJsonData2[$strKey];

            if( $mixValue1 === $mixValue2 ){
                $arResult[$strKey] = $mixValue1;
                continue;
            }


            if( isset($mixValue1) ) $arResult["- " . $strKey] = $mixValue1;
            if( isset($mixValue2) ) $arResult["+ " . $strKey] = $mixValue2;
        }

        return json_encode($arResult);
    }

    /**
     * @param $strFilePath
     * @return array
     */
    private function getJsonData($strFilePath ): array
    {
        $strFileData = file_get_contents($strFilePath);
        $arFileData = json_decode($strFileData, true);

        if( empty( $arFileData ) ){
            return array();
        }

        return $arFileData;
    }
}