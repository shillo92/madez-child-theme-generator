<?php
namespace TwfChildTheme\Madez;


use TwfChildTheme\Config;

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
        add_action( 'wp_enqueue_scripts', function () { $this->setupJavascripts(); } );
    }


    protected function setupJavascripts()
    {
        $name = 'child-script';
        $filename = Config::getThemeRootUri() . '/js/build.min.js';

        wp_enqueue_script( $name, $filename, [],
            filemtime(Config::getThemeRootDirname().'/js/build.min.js'), true );
    }

    protected function setupStylesheet()
    {
        $parent_style = 'parent-style';
        $mainStylesheetFilename = Config::getMainStylesheetRelativeFilename();

        // Load parent stylesheet
        WordpressFacilizer::loadStylesheet($parent_style, Config::getParentThemeRootRelativeUri().'/style.css', [],
            StylesheetRefreshOptions::NOACTION);

        // Load child stylesheet
        WordpressFacilizer::loadStylesheet('child-style', $mainStylesheetFilename, [$parent_style]);
    }

    protected function setupI18N()
    {
        load_child_theme_textdomain( Config::getTextDomain(), Config::getThemeRootDirname() . '/languages' );
    }
}