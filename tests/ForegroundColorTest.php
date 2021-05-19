<?php declare(strict_types=1);

namespace lfischer\openWeatherMap\Tests;

use lfischer\cli\Color\FG;
use lfischer\cli\ForegroundColor;
use PHPUnit\Framework\TestCase;

final class ForegroundColorTest extends TestCase
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
            ['NONE', 39],
            ['RESET', 39],
            ['BLACK', 30],
            ['RED', 31],
            ['GREEN', 32],
            ['YELLOW', 33],
            ['BLUE', 34],
            ['MAGENTA', 35],
            ['CYAN', 36],
            ['WHITE', 37],
            ['BRIGHT_BLACK', 90],
            ['BRIGHT_RED', 91],
            ['BRIGHT_GREEN', 92],
            ['BRIGHT_YELLOW', 93],
            ['BRIGHT_BLUE', 94],
            ['BRIGHT_MAGENTA', 95],
            ['BRIGHT_CYAN', 96],
            ['BRIGHT_WHITE', 97]
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
            constant(ForegroundColor::class . '::' . $colorName)
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
            "\033[{$colorNumber}m{$colorName}\033[39m",
            call_user_func(ForegroundColor::class . '::' . strtolower($colorName), $colorName)
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
        $this->assertEquals("\033[38;2;{$red};{$green};{$blue}m", ForegroundColor::rgb($red, $green, $blue));
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
            constant(FG::class . '::' . $colorName)
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
            "\033[{$colorNumber}m{$colorName}\033[39m",
            call_user_func(FG::class . '::' . strtolower($colorName), $colorName)
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
        $this->assertEquals("\033[38;2;{$red};{$green};{$blue}m", FG::rgb($red, $green, $blue));
    }
}
