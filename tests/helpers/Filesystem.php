<?php
namespace TwfChildTheme\Tests\Helpers;

/**
 * Class Filesystem
 * @package TwfChildTheme\Tests\Madez
 */
class Filesystem
{
    const EMPTYCLASS_FILENAME = __DIR__.'/EmptyClass.inc';
    const ROOTDIR = __DIR__.'/../..';
    const LIBRARY_PATH = self::ROOTDIR.'/library';

    private static $filesystem = null;

    /**
     * Returns a \Symfony\Component\Filesystem\Filesystem singleton.
     *
     * @return \Symfony\Component\Filesystem\Filesystem
     */
    public static function getFilesystem()
    {
        if (self::$filesystem === null) {
            self::$filesystem = new \Symfony\Component\Filesystem\Filesystem();
        }

        return self::$filesystem;
    }
}