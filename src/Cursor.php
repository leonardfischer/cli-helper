<?php

namespace lfischer\cli;

use lfischer\cli\Exception\CursorException;

/**
 * Class Cursor
 *
 * @package lfischer\cli
 */
class Cursor
{
    public const HOME = "\033[H";
    public const UP = "\033[1A";
    public const DOWN = "\033[1B";
    public const FORWARD = "\033[1C";
    public const BACKWARD = "\033[1D";

    public const START = "\r";
    public const NEXT_LINE = PHP_EOL;

    /**
     * @param int $steps
     * @return string
     * @throws CursorException
     */
    public static function up(int $steps = 1): string
    {
        if ($steps <= 0) {
            throw new CursorException('The step should at least be 1');
        }

        return "\033[{$steps}A";
    }

    /**
     * @param int $steps
     * @return string
     * @throws CursorException
     */
    public static function down(int $steps = 1): string
    {
        if ($steps <= 0) {
            throw new CursorException('The step should at least be 1');
        }

        return "\033[{$steps}B";
    }

    /**
     * @param int $steps
     * @return string
     * @throws CursorException
     */
    public static function forward(int $steps = 1): string
    {
        if ($steps <= 0) {
            throw new CursorException('The step should at least be 1');
        }

        return "\033[{$steps}C";
    }

    /**
     * @param int $steps
     * @return string
     * @throws CursorException
     */
    public static function backward(int $steps = 1): string
    {
        if ($steps <= 0) {
            throw new CursorException('The step should at least be 1');
        }

        return "\033[{$steps}D";
    }

    /**
     * @param int $row
     * @param int $column
     * @return string
     * @throws CursorException
     */
    public function force(int $row, int $column): string
    {
        if (min($row, $column) < 0) {
            throw new CursorException('The cursor position needs to be positive!');
        }

        return "\033[{$row};{$column}H";
    }
}
