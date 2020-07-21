# CLI helper

A small component to help you output stuff on the command line interface (CLI). I found a lot of information on [termsys.demon.co.uk/vtansi.htm](http://www.termsys.demon.co.uk/vtansi.htm).
This project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).
 
# Usage

The most basic usage of the CLI components would be via their constants, for example:

```php
use lfischer\cli\BackgroundColor;
use lfischer\cli\ForegroundColor;
use lfischer\cli\Cursor;

echo BackgroundColor::BLUE . 'Blue background!' . BackgroundColor::RESET . Cursor::NEXT_LINE;
echo ForegroundColor::BLUE . 'Blue foreground!' . ForegroundColor::RESET . Cursor::NEXT_LINE;
echo Cursor::UP . Cursor::START . 'Overwriting the Previous line!';
```

Or, if you like shorter names: 

```php
use lfischer\cli\Color\BG;
use lfischer\cli\Color\FG;

echo BG::BLUE . 'Blue background!' . BG::NONE . PHP_EOL;
echo FG::BLUE . 'Blue foreground!' . FG::NONE . PHP_EOL;
```

Also, since version 1.2.0, there are some convenience methods to simplify the usage even more:

```php
use lfischer\cli\Color\BG;
use lfischer\cli\Color\FG;
use lfischer\cli\Style;

echo BG::blue('Blue background!') . PHP_EOL;
echo FG::blue('Blue foreground!') . PHP_EOL;
echo Style::bold('Bold text!') . PHP_EOL;

// Combine them!
echo Style::underline(FG::red('Underlined red text!')) . PHP_EOL;
```

But wait, there is more! For example more static methods for coloring your output in full RGB:

```php
use lfischer\cli\BackgroundColor;
use lfischer\cli\ForegroundColor;

echo BackgroundColor::rgb(255, 0, 0) . 'Red background!' . BackgroundColor::NONE;
echo ForegroundColor::rgb(0, 255, 0) . 'Green foreground!' . ForegroundColor::NONE;
```

# Static code analysis and code style

The code is being statically analyzed with the help of [vimeo/psalm](https://packagist.org/packages/vimeo/psalm). The PSR2 code style will be checked/applied with the help of [friendsofphp/php-cs-fixer](https://packagist.org/packages/friendsofphp/php-cs-fixer).
