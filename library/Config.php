<?php
namespace TwfChildTheme;

final class Config
{
    /**
     * Returns the original (not translated) text domain found in style.css.
     *
     * @return string
     */
    public static function getTextDomain()
    {
        $theme = wp_get_theme();

        return $theme->get('TextDomain');
    }

    /**
     * @return string
     */
    public static function getMainStylesheetFilename()
    {
        return self::getThemeRootDirname().'/style.css';
    }

    /**
     * Returns the path to the parent theme root directory.
     *
     * @see get_stylesheet_directory()
     */
    public static function getParentThemeRootDirname()
    {
        return get_template_directory_uri();
    }

    /**
     * Returns the path to the theme's root directory.
     *
     * @see get_stylesheet_directory()
     */
    public static function getThemeRootDirname()
    {
        return get_stylesheet_directory();
    }
}