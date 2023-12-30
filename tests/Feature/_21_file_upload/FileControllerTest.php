<?php

namespace Tests\Feature\_21_file_upload;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

// php artisan test --filter FileControllerTest
class FileControllerTest extends TestCase
{
    public function testUpload()
    {
        $image = UploadedFile::fake()->image("Yoga.png");

        $this->post("/fileupload",
            [
                "picture" => $image
            ]
        )->assertSeeText("OK Yoga.png");
    }
}
