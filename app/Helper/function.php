<?php
function randString($length){
    $chars = "abcdefghijklmnopqrstuvwxyz";
    $str = '';
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++){
        $str .= $chars[rand(0, $size - 1)];
    }

    return $str;
}
