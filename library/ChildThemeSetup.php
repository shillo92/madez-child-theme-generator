<?php
namespace TwfChildTheme;


use TwfChildTheme\Helpers\StylesheetRefreshOptions;
use TwfChildTheme\Helpers\WordpressFacilizer;

class ChildThemeSetup
{
    /**
     * @var ChildThemeSetup
     */
    private static $instance = null;

    /**
     * @return ChildThemeSetup
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Private constructor, use getInstance() instead.
     *
     * @see ChildThemeSetup::getInstance()
     */
    private function __construct()
    {
    }

    public function setup()
    {
        add_action( 'after_setup_theme', function() { $this->setupI18N(); } );
        add_action( 'wp_enqueue_scripts', function () { $this->setupStylesheet(); } );
    }

    protected function setupStylesheet()
    {
        $parent_style = 'parent-style';
        $mainStylesheetFilename = Config::getMainStylesheetFilename();

        // Load parent stylesheet
        WordpressFacilizer::loadStylesheet($parent_style, Config::getParentThemeRootDirname().'/style.css', [],
            StylesheetRefreshOptions::NOACTION);

        // Load child stylesheet
        WordpressFacilizer::loadStylesheet('child-style', $mainStylesheetFilename, [$parent_style]);
    }

    protected function setupI18N()
    {
        load_child_theme_textdomain( Config::getTextDomain(), Config::getThemeRootDirname() . '/languages' );
    }
}