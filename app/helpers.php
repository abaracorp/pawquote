<?php

if (!function_exists('editIcon')) {
    function editIcon()
    {
        return view('components.icons.edit')->render();
    }
}

if (!function_exists('deleteIcon')) {
    function deleteIcon()
    {
        return view('components.icons.delete')->render();
    }
}

if (!function_exists('viewIcon')) {
    function viewIcon()
    {
        return view('components.icons.view')->render();
    }
}

