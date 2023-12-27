<?php

namespace Tests\Feature\_20_file_storage\_abc_file_storage_file_sistem;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

// php artisan test --filter FileStorageTest
class FileStorageTest extends TestCase
{
    public function testDiskLocal()
    {
        $fileSystem = Storage::disk("local");

        $fileSystem->put("disk_local_file.txt", "Local - Yoga Dimas Pambudi - Revision 1.0");

        $content = $fileSystem->get("disk_local_file.txt");

        assertEquals("Local - Yoga Dimas Pambudi - Revision 1.0", $content);
    }

    public function testDiskPublic()
    {
        $fileSystem = Storage::disk("public");

        $fileSystem->put("disk_public_file.txt", "Public - Yoga Dimas Pambudi - Revision 1.0");

        $content = $fileSystem->get("disk_public_file.txt");

        assertEquals("Public - Yoga Dimas Pambudi - Revision 1.0", $content);
    }
}
