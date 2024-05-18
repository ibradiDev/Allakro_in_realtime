<?php
namespace App\Http\Middleware\Helpers;

class Text
{
    /**
     * Excerpt substring from the given string
     * @param string $text
     * @param int $limit
     * @return string
     */
    public static function excerpt(string $text, int $limit = 60)
    {
        if (mb_strlen($text) <= $limit)
            return $text;

        $lastSpace = mb_strpos($text, ' ', $limit);
        return mb_substr($text, 0, $lastSpace) . '...';
    }
}