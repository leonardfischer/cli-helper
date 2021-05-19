<?php declare(strict_types=1);

namespace lfischer\openWeatherMap\Tests;

use lfischer\cli\Style;
use PHPUnit\Framework\TestCase;

final class StyleTest extends TestCase
{
    /**
     * @return array
     */
    public function styleProvider(): array
    {
        return [
            ['NONE', 0],
            ['RESET', 0],
            ['BOLD', 1],
            ['UNDERLINE', 4],
            ['NOUNDERLINE', 24],
            ['NEGATIVE', 7],
            ['POSITIVE', 27]
        ];
    }

    /**
     * @dataProvider styleProvider
     * @param string $styleName
     * @param int    $styleNumber
     */
    public function testConstantUsage(string $styleName, int $styleNumber)
    {
        $this->assertEquals(
            "\033[{$styleNumber}m",
            constant(Style::class . '::' . $styleName)
        );
    }

    /**
     * @dataProvider styleProvider
     * @param string $styleName
     * @param int    $styleNumber
     */
    public function testStaticMethodUsage(string $styleName, int $styleNumber)
    {
        $this->assertEquals(
            "\033[{$styleNumber}m{$styleName}\033[0m",
            call_user_func(Style::class . '::' . strtolower($styleName), $styleName)
        );
    }
}
