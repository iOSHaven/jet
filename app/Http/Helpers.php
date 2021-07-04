<?php

if (!function_exists("array_except")) {
    function array_except($array, $keys) {
        return array_diff_key($array, array_flip((array) $keys));
    }
}
