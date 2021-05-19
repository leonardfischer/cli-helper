<?php declare(strict_types=1);

namespace lfischer\openWeatherMap\Tests;

use lfischer\cli\Color\BG;
use lfischer\cli\BackgroundColor;
use PHPUnit\Framework\TestCase;

final class BackgroundColorTest extends TestCase
{
    /**
     * @return array
     */
    public function rgbProvider(): array
    {
        return [
            [0, 0, 0],
            [128, 0, 0],
            [255, 0, 0],
            [255, 128, 0],
            [255, 255, 0],
            [255, 255, 128],
            [255, 255, 255],
            [128, 255, 255],
            [0, 255, 255],
            [0, 128, 255],
            [0, 0, 255],
            [0, 0, 128],
        ];
    }

    /**
     * @return array
     */
    public function colorProvider(): array
    {
        return [
            ['NONE', 49],
            ['RESET', 49],
            ['BLACK', 40],
            ['RED', 41],
            ['GREEN', 42],
            ['YELLOW', 43],
            ['BLUE', 44],
            ['MAGENTA', 45],
            ['CYAN', 46],
            ['WHITE', 47],
            ['BRIGHT_BLACK', 100],
            ['BRIGHT_RED', 101],
            ['BRIGHT_GREEN', 102],
            ['BRIGHT_YELLOW', 103],
            ['BRIGHT_BLUE', 104],
            ['BRIGHT_MAGENTA', 105],
            ['BRIGHT_CYAN', 106],
            ['BRIGHT_WHITE', 107]
        ];
    }

    /**
     * @dataProvider colorProvider
     * @param string $colorName
     * @param int    $colorNumber
     */
    public function testConstantUsage(string $colorName, int $colorNumber)
    {
        $this->assertEquals(
            "\033[{$colorNumber}m",
            constant(BackgroundColor::class . '::' . $colorName)
        );
    }

    /**
     * @dataProvider colorProvider
     * @param string $colorName
     * @param int    $colorNumber
     */
    public function testStaticMethodUsage(string $colorName, int $colorNumber)
    {
        $this->assertEquals(
            "\033[{$colorNumber}m{$colorName}\033[49m",
            call_user_func(BackgroundColor::class . '::' . strtolower($colorName), $colorName)
        );
    }

    /**
     * @dataProvider rgbProvider
     * @param int $red
     * @param int $green
     * @param int $blue
     * @throws \lfischer\cli\Exception\ColorException
     */
    public function testRgbMethod(int $red, int $green, int $blue)
    {
        $this->assertEquals("\033[48;2;{$red};{$green};{$blue}m", BackgroundColor::rgb($red, $green, $blue));
    }

    /**
     * @dataProvider colorProvider
     * @param string $colorName
     * @param int    $colorNumber
     */
    public function testShortConstantUsage(string $colorName, int $colorNumber)
    {
        $this->assertEquals(
            "\033[{$colorNumber}m",
            constant(BG::class . '::' . $colorName)
        );
    }

    /**
     * @dataProvider colorProvider
     * @param string $colorName
     * @param int    $colorNumber
     */
    public function testShortStaticMethodUsage(string $colorName, int $colorNumber)
    {
        $this->assertEquals(
            "\033[{$colorNumber}m{$colorName}\033[49m",
            call_user_func(BG::class . '::' . strtolower($colorName), $colorName)
        );
    }

    /**
     * @dataProvider rgbProvider
     * @param int $red
     * @param int $green
     * @param int $blue
     * @throws \lfischer\cli\Exception\ColorException
     */
    public function testShortRgbMethod(int $red, int $green, int $blue)
    {
        $this->assertEquals("\033[48;2;{$red};{$green};{$blue}m", BG::rgb($red, $green, $blue));
    }
}
