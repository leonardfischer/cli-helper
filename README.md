# CLI helper

A small component to help you output stuff on the command line interface (CLI).
 
# Usage

The most basic usage of the CLI components would be via their constants, for example:

```php
use lfischer\cli\BackgroundColor;
use lfischer\cli\ForegroundColor;
use lfischer\cli\Cursor;

echo BackgroundColor::BLUE . 'Blue background!' . BackgroundColor::NONE . Cursor::NEXT_LINE;
echo ForegroundColor::BLUE . 'Blue foreground!' . ForegroundColor::NONE . Cursor::NEXT_LINE;
echo Cursor::UP . Cursor::START . 'Overwriting the Previous line!';
```

But of course there is more, for example some classes offer static methods, like for coloring your output in full RGB:

```php
use lfischer\cli\BackgroundColor;
use lfischer\cli\ForegroundColor;

echo BackgroundColor::rgb(255, 0, 0) . 'Red background!' . BackgroundColor::NONE;
echo ForegroundColor::rgb(0, 255, 0) . 'Green foreground!' . ForegroundColor::NONE;
```

# Static code analysis and code style

The code is being statically analyzed with the help of [vimeo/psalm](https://packagist.org/packages/vimeo/psalm). The PSR2 code style will be checked/applied with the help of [friendsofphp/php-cs-fixer](https://packagist.org/packages/friendsofphp/php-cs-fixer).
