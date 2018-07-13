<?php
namespace Gnefiy\Utils;

class ValidateUtils
{
    public static function phone($phone)
    {
        if (!preg_match("/^1[34578]{1}\d{9}$/", $phone)) {
            return false;
        }

        return true;
    }
}