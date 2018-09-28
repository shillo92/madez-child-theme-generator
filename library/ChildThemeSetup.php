<?php
namespace TwfChildTheme;


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
        wp_enqueue_style( $parent_style, Config::getParentThemeRootDirname() . '/style.css' );

        // Load child stylesheet
        wp_enqueue_style( 'child-style',
            $mainStylesheetFilename,
            array( $parent_style ),
            filemtime($mainStylesheetFilename)
        );
    }

    protected function setupI18N()
    {
        load_child_theme_textdomain( Config::getTextDomain(), Config::getThemeRootDirname() . '/languages' );
    }
}