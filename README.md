# CLI helper

A small component to help you output stuff on the command line interface (CLI). I found a lot of information on [termsys.demon.co.uk/vtansi.htm](http://www.termsys.demon.co.uk/vtansi.htm).
This project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

# Usage

## Foreground color

The foreground color (= text color) can be changed with the classes `ForegroundColor` and `FG` (as abbreviation).
You can use the class constants or the static methods to set different colors. There is even a method to use the full
`rgb` spectrum :)

```php
use lfischer\cli\ForegroundColor;
use lfischer\cli\Color\FG;

echo ForegroundColor::BLUE . 'Blue foreground!' . ForegroundColor::RESET . PHP_EOL;
echo ForegroundColor::blue('Blue foreground!') . PHP_EOL;
echo FG::BLUE . 'Blue foreground!' . FG::NONE . PHP_EOL;
echo FG::blue('Blue foreground!') . PHP_EOL;
echo FG::rgb(0, 0, 255) . 'Blue foreground!' . FG::RESET . PHP_EOL;
```

## Background color

The same functionality can be used for the background with the classes `BackgroundColor` and `BG` (as abbreviation):

```php
use lfischer\cli\BackgroundColor;
use lfischer\cli\Color\BG;

echo BackgroundColor::BLUE . 'Blue foreground!' . BackgroundColor::RESET . PHP_EOL;
echo BackgroundColor::blue('Blue foreground!') . PHP_EOL;
echo BG::BLUE . 'Blue foreground!' . BG::NONE . PHP_EOL;
echo BG::blue('Blue foreground!') . PHP_EOL;
echo BG::rgb(0, 0, 255) . 'Blue foreground!' . BG::RESET . PHP_EOL;
```

## Output styling

You can also define the style of the output with the `Style` class.

```php
use lfischer\cli\Style;

echo Style::bold('Bold') . PHP_EOL;
echo Style::underline('Underline') . PHP_EOL;
echo Style::nounderline('No underline') . PHP_EOL;
echo Style::negative('Negative') . PHP_EOL;
echo Style::positive('Positive') . PHP_EOL;
```

## Ask questions interactively

You can make the CLI more interactive by requesting input from the user, with the help of the `Input` class:
`$answer = Input::ask('<question>', '<optional default value>');`

```php
use lfischer\cli\Input;

$name = Input::ask('What is your name?');
$result = Input::ask('Do you like PHP?', 'yes');
```

# Static code analysis and code style

The code is being statically analyzed with the help of [vimeo/psalm](https://packagist.org/packages/vimeo/psalm). The PSR2 code style will be checked/applied with the help of [friendsofphp/php-cs-fixer](https://packagist.org/packages/friendsofphp/php-cs-fixer).

# Unit tests thanks to PHP Unit

Starting with version 1.3.0 there are unit tests for the basic usage of colors and styles.
