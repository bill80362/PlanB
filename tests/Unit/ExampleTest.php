<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use PHPUnit\Framework\Attributes\DataProvider;

class ExampleTest extends TestCase
{
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }


    /**
     * 參數使用範例
     */
    #[DataProvider('getNameProvider')]
    public function test_example_params($a, $b): void
    {
        $result = $a + $b;
        $this->assertIsNumeric($result);
        $this->assertTrue($result > 0);
    }

    public static function getNameProvider(): array
    {
        return [
            [1, 3],
            [2, 9]
        ];
    }
}
