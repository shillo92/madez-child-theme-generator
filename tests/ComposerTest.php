<?php
declare(strict_types=1);

namespace TwfChildTheme\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Exception\IOException;
use TwfChildTheme\Tests\Helpers\Filesystem as FilesystemHelper;

/**
 * Tests Composer functionality.
 *
 * @package TwfChildTheme\Tests
 */
class ComposerTest extends \WP_UnitTestCase
{
    const EMPTYCLASS_DEST_FILENAME = FilesystemHelper::LIBRARY_PATH.'/tmp/EmptyClass.php';

    public function testAutoloadCanLoadLibraryClasses() : void
    {
        $this->copyEmptyClass();

        $this->assertTrue(class_exists('\TwfChildTheme\Tmp\EmptyClass'));

        $this->deleteEmptyClass();
    }

    /**
     * Deletes the EmptyClass from library directory.
     *
     * @throws IOException
     */
    protected function deleteEmptyClass()
    {
        $fileSystem = FilesystemHelper::getFilesystem();

        try {
            $fileSystem->remove(self::EMPTYCLASS_DEST_FILENAME);
        } catch (IOException $e) {
            throw $e;
        }
    }

    /**
     * Copies the EmptyClass to the library path.
     *
     * @throws IOException
     */
    protected function copyEmptyClass()
    {
        $fileSystem = FilesystemHelper::getFilesystem();

        try {
            $fileSystem->copy(FilesystemHelper::EMPTYCLASS_FILENAME, self::EMPTYCLASS_DEST_FILENAME);
        } catch (IOException $e) {
            throw $e;
        }
    }
}
