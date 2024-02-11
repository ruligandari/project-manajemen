<?php

namespace App\Helpers;

if (!function_exists('gravatar_url')) {
    function gravatar_url($email, $size = 100, $default = 'retro')
    {
        $hash = md5(strtolower(trim($email)));
        return "https://www.gravatar.com/avatar/$hash?s=$size&d=$default";
    }
}
