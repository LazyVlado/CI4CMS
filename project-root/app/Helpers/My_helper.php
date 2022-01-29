<?php

function camelize($string = ''){
    $search = array("_", "-", " ", "\t", "\r", "\n", "\f", "\v");
    $replace = array("", "", "", "", "", "", "", "");
    $string = mb_strtolower($string, 'UTF-8');
    $string = ucwords($string, implode('', $search));
    $string = str_replace($search, $replace, $string);
    return $string;
}