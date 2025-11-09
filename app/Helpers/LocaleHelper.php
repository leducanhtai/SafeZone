<?php

if (!function_exists('currentLocale')) {
    /**
     * Get current application locale
     *
     * @return string
     */
    function currentLocale()
    {
        return app()->getLocale();
    }
}

if (!function_exists('availableLocales')) {
    /**
     * Get all available locales
     *
     * @return array
     */
    function availableLocales()
    {
        return config('app.available_locales', ['en' => 'English', 'vi' => 'Tiếng Việt']);
    }
}

if (!function_exists('localeName')) {
    /**
     * Get locale name by code
     *
     * @param string $code
     * @return string
     */
    function localeName($code)
    {
        $locales = availableLocales();
        return $locales[$code] ?? $code;
    }
}

if (!function_exists('isRtl')) {
    /**
     * Check if current locale is RTL
     *
     * @return bool
     */
    function isRtl()
    {
        $rtlLocales = ['ar', 'he', 'fa', 'ur'];
        return in_array(currentLocale(), $rtlLocales);
    }
}
