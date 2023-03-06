<?php

namespace App\Tools;

class StringTools {

    public static function toCamelCase($value, $pascalCase = false) {
        $value = ucwords(str_replace(array('-', '_'), ' ', $value));
        $value = str_replace(' ', '', $value);
        if ($pascalCase === false) {
            return lcfirst($value);
        } else {
            return $value;
        }
    }

    public static function toPascalCase($value) {

        return self::toCamelCase($value, true);

    }

    function linesToArray (string $string) {
        return explode(PHP_EOL, $string);
    }
    
    function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    
      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
    
      // trim
      $text = trim($text, $divider);
    
      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);
    
      // lowercase
      $text = strtolower($text);
    
      if (empty($text)) {
        return 'n-a';
      }
    
      return $text;
    }
}



