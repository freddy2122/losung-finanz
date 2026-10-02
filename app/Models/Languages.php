<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public static function get()
    {
        return [
            'fr' => 'Français',
            'pt' => 'português',
            'de' => 'Deutsch',
        ];
    }

    /**
     * Check if the language is valid.
     *
     * @param string $iso_code
     * @return boolean|string Returns language name if valid, false otherwise
     */
    public static function check($iso_code)
    {
        $languages = self::get();

        if ( ! empty($languages[ $iso_code ]) ) {
            return $languages[ $iso_code ];
        }
        return false;
    }

    /**
     * Validate if the provided language locale exists.
     *
     * @param string $locale
     * @return boolean
     */
    public static function isValid($locale)
    {
        $languages = self::get();
        return array_key_exists($locale, $languages);
    }
}
