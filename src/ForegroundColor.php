<?php

namespace lfischer\cli;

use lfischer\cli\Exception\ColorException;

/**
 * Class ForegroundColor
 *
 * @package lfischer\cli
 *
 * @method static string none(string $message)
 * @method static string reset(string $message)
 * @method static string black(string $message)
 * @method static string red(string $message)
 * @method static string green(string $message)
 * @method static string yellow(string $message)
 * @method static string blue(string $message)
 * @method static string magenta(string $message)
 * @method static string cyan(string $message)
 * @method static string white(string $message)
 * @method static string bright_black(string $message)
 * @method static string bright_red(string $message)
 * @method static string bright_green(string $message)
 * @method static string bright_yellow(string $message)
 * @method static string bright_blue(string $message)
 * @method static string bright_magenta(string $message)
 * @method static string bright_cyan(string $message)
 * @method static string bright_white(string $message)
 */
class ForegroundColor
{
    public const NONE = "\033[39m";
    public const RESET = "\033[39m";

    public const BLACK = "\033[30m";
    public const RED = "\033[31m";
    public const GREEN = "\033[32m";
    public const YELLOW = "\033[33m";
    public const BLUE = "\033[34m";
    public const MAGENTA = "\033[35m";
    public const CYAN = "\033[36m";
    public const WHITE = "\033[37m";

    public const BRIGHT_BLACK = "\033[90m";
    public const BRIGHT_RED = "\033[91m";
    public const BRIGHT_GREEN = "\033[92m";
    public const BRIGHT_YELLOW = "\033[93m";
    public const BRIGHT_BLUE = "\033[94m";
    public const BRIGHT_MAGENTA = "\033[95m";
    public const BRIGHT_CYAN = "\033[96m";
    public const BRIGHT_WHITE = "\033[97m";

    private const RGB_TEMPLATE = "\033[38;2;<r>;<g>;<b>m";

    /**
     * @param string $name
     * @param array $arguments
     * @return string
     */
    public static function __callStatic(string $name, array $arguments): string
    {
        if (defined('self::' . strtoupper($name))) {
            return constant('self::' . strtoupper($name)) . $arguments[0] . self::RESET;
        }

        return $arguments[0];
    }

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return string
     * @throws ColorException
     */
    public static function rgb(int $red, int $green, int $blue): string
    {
        if (min($red, $green, $blue) < 0) {
            throw new ColorException('One of the given color values is lower than 0');
        }

        if (max($red, $green, $blue) > 255) {
            throw new ColorException('One of the given color value is higher than 255');
        }

        return str_replace(['<r>', '<g>', '<b>'], [$red, $green, $blue], self::RGB_TEMPLATE);
    }
}
