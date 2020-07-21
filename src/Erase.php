<?php

namespace lfischer\cli;

/**
 * Class Erase
 *
 * @package lfischer\cli
 */
class Erase
{
    public const END_OF_LINE = "\033[K";
    public const START_OF_LINE = "\033[1K";
    public const LINE = "\033[2K";
    public const DOWN = "\033[J";
    public const UP = "\033[1J";
    public const SCREEN = "\033[2D";
}
