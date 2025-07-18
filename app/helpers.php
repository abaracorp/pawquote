<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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

if (!function_exists('isActiveRoute')) {
    function isActiveRoute(array $routes, $class = 'active') {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return $class;
            }
        }
        return '';
    }
}


if (!function_exists('hasMoreThanWords')) {
   
    function hasMoreThanWords(string $content, int $limit = 100): bool
    {
        $text = strip_tags($content);
        $wordCount = str_word_count($text);
        return $wordCount > $limit;
    }
}

if (!function_exists('hasMoreThanChars')) {
   
        function hasMoreThanChars(string $content, int $limit = 100): bool
    {
        $text = strip_tags($content); 
        $charCount = mb_strlen($text); 
        return $charCount > $limit;
    }
}

if (!function_exists('generateUniqueSlug')) {

function generateUniqueSlug(string $title, string $table, string $slugColumn = 'slug'): string
{
    $slug = Str::slug($title);
    $originalSlug = $slug;
    $counter = 1;

    while (DB::table($table)->where($slugColumn, $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter++;
    }

    return $slug;
}


}

if (!function_exists('generateUniqueSlugForBlog')) {

function generateUniqueSlugForBlog(string $baseSlug, string $table, string $slugColumn = 'slug', $ignoreId = null): string
    {
        $slug = Str::slug($baseSlug);
        $originalSlug = $slug;
        $counter = 1;

        do {
            $query = DB::table($table)->where($slugColumn, $slug);

            if ($ignoreId !== null) {
                $query->where('id', '!=', $ignoreId);
            }

            $exists = $query->exists();

            if ($exists) {
                $slug = $originalSlug . '-' . $counter++;
            }

        } while ($exists);

        return $slug;
    }


}

