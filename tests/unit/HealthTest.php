<?php

declare(strict_types=1);

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;
use Tests\Support\Libraries\ConfigReader;

use function defined;
use function file;
use function is_file;
use function preg_grep;

class HealthTest extends CIUnitTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIsDefinedAppPath(): void
    {
        $test = defined('APPPATH');

        $this->assertTrue($test);
    }

    public function testBaseUrlHasBeenSet(): void
    {
        $env = $config = false;

        // First check in .env
        if (is_file(HOMEPATH . '.env')) {
            // @phpstan-ignore-next-line
            $env = (bool) preg_grep("/^app\.baseURL = './", file(HOMEPATH . '.env'));
        }

        // Then check the actual config file
        $reader = new ConfigReader();
        $config = ! empty($reader->baseUrl);

        $this->assertTrue($env || $config);
    }
}
