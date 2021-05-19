<?php

namespace lfischer\cli;

use lfischer\cli\Color\FG;

/**
 * Class Input
 *
 * @package lfischer\cli
 */
class Input
{
    /**
     * @param string $question
     * @param null   $default
     * @return string
     */
    public static function ask(string $question, $default = null): string
    {
        if ($default !== null) {
            $default = ' [' . FG::yellow($default) . ']';
        }

        echo FG::green($question) . $default . ':' . PHP_EOL . ' > ';

        $response = trim(fgets(STDIN));

        if ($response === '') {
            return (string)$default;
        }

        return $response;
    }
}
