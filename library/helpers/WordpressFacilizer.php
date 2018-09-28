<?php
namespace TwfChildTheme\Helpers;

use TwfChildTheme\Config;

class WordpressFacilizer
{
    /**
     * @param string $name
     * @param string $filename
     * @param array $dependencies Defaults to none (empty array).
     * @param int $refreshOptions One of StylesheetRefreshOptions constants. Defaults to StylesheetRefreshOptions::AT_FILE_CHANGE.
     * @param string $media Defaults to 'all'.
     */
    public static function loadStylesheet($name, $filename, array $dependencies = [],
                                          $refreshOptions = StylesheetRefreshOptions::AT_FILE_CHANGE, $media = 'all')
    {
        $verArg = false;

        switch ($refreshOptions) {
            case StylesheetRefreshOptions::AT_FILE_CHANGE:
                $verArg = filemtime($filename);
                break;
            case StylesheetRefreshOptions::AT_THEME_VERSION_CHANGE:
                $verArg = Config::getVersion();
                break;
        }

        wp_enqueue_style($name, $filename, $dependencies, $verArg, $media);
    }
}

final class StylesheetRefreshOptions
{
    const NOACTION = 0;
    /**
     * Tells Wordpress to load the file every time a change is made.
     */
    const AT_FILE_CHANGE = 1;
    /**
     * Tells Wordpress to load the file every time the theme's version is changed.
     */
    const AT_THEME_VERSION_CHANGE = 2;
}