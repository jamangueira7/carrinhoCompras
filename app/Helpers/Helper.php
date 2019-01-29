<?php
/**
 * Created by PhpStorm.
 * User: Mangueira
 * Date: 28/01/2019
 * Time: 21:55
 */

namespace App\Helpers;


class Helper
{
    static function codeGeneration()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789";
        $randomString = '';
        for($i = 0; $i < 20; $i = $i+1){
            $randomString .= $chars[mt_rand(0,60)];
        }
        return $randomString;
    }
}
