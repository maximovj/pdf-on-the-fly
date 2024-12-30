<?php

/* The code provided is defining several PHP functions that are related to retrieving user data from a
system called Backpack. Here is a summary of each function: */

if (!function_exists('editmode_e'))
{
    function editmode_e(string $name = null, $default = null)
    {
        $edit_mode_fields = session('edit_mode_fields', []);
        return $edit_mode_fields[$name] ?? $default;
    }
}
