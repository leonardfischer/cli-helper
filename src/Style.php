<?php

namespace lfischer\cli;

/**
 * Class Style
 * @package lfischer\cli
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
}
