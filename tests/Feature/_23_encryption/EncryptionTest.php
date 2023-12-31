<?php

namespace Tests\Feature\_23_encryption;

use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

// php artisan test --filter EncryptionTest
class EncryptionTest extends TestCase
{
   public function testEncryption() {

    $encrypt = Crypt::encrypt("Yoga Dimas");
    var_dump($encrypt);

    $decrypt = Crypt::decrypt($encrypt);

    assertEquals("Yoga Dimas", $decrypt);
   }
}
