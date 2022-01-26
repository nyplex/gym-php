<?php 

namespace App\Helpers;

class Text {

    public static function excerpt(string $content, int $nbr = 60)
    {
        if(mb_strlen($content) <= $nbr) {
            return $content;
        }else {
            return substr($content, 0, $nbr) . '...';
        }
    }

}