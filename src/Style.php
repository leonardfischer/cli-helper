<?php

namespace lfischer\cli;

/**
 * Class Style
 *
 * @package lfischer\cli
 *
 * @method static string none(string $message)
 * @method static string reset(string $message)
 * @method static string bold(string $message)
 * @method static string underline(string $message)
 * @method static string nounderline(string $message)
 * @method static string negative(string $message)
 * @method static string positive(string $message)
 */
class Style
{
    public const NONE = "\033[0m";
    public const RESET = "\033[0m";
    public const BOLD = "\033[1m";
    public const UNDERLINE = "\033[4m";
    public const NOUNDERLINE = "\033[24m";
    public const NEGATIVE = "\033[7m";
    public const POSITIVE = "\033[27m";

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
}
