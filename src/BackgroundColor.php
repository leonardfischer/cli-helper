<?php

namespace lfischer\cli;

use lfischer\cli\Exception\ColorException;

/**
 * Class BackgroundColor
 *
 * @package lfischer\cli
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
class BackgroundColor
{
    public const NONE = "\033[49m";
    public const RESET = "\033[49m";

    public const BLACK = "\033[40m";
    public const RED = "\033[41m";
    public const GREEN = "\033[42m";
    public const YELLOW = "\033[43m";
    public const BLUE = "\033[44m";
    public const MAGENTA = "\033[45m";
    public const CYAN = "\033[46m";
    public const WHITE = "\033[47m";

    public const BRIGHT_BLACK = "\033[100m";
    public const BRIGHT_RED = "\033[101m";
    public const BRIGHT_GREEN = "\033[102m";
    public const BRIGHT_YELLOW = "\033[103m";
    public const BRIGHT_BLUE = "\033[104m";
    public const BRIGHT_MAGENTA = "\033[105m";
    public const BRIGHT_CYAN = "\033[106m";
    public const BRIGHT_WHITE = "\033[107m";

    private const RGB_TEMPLATE = "\033[48;2;<r>;<g>;<b>m";

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
