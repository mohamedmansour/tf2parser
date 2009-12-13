<?php
class TF2Formatter 
{

    public static function formatRemoveComma($input)
    {
         return str_replace(',','',$input);
    }
    public static function formatLongestLife($input)
    {
        if(preg_match('#(.*):(.*)#',$input,$match))
        {
            $minutes = $match[1];
            $seconds = $match[2];
            return $minutes * 60 + $seconds;
        }
        else return $input;
    }
}
?>