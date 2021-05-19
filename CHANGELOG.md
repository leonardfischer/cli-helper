# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.3.0]  - 2021-05-19
### Added
- `Input` class to ask questions and await user input (`$answer = Input::ask('How are you?', 'great!');`)
- PHP Unit + some tests for fore- and backgroundcolors
- `.editorconfig` file

## [1.2.0] - 2020-07-21
### Added
- New convenience method type-hints to set foreground colors, according to existing constants `FG::red('red text')` (via `__callStatic`)
- New convenience method type-hints to set background colors, according to existing constants `BG::red('red background')` (via `__callStatic`)
- New convenience method type-hints to set styles, according to existing constants `Style::udnerline('underlined text')` (via `__callStatic`)

### Fixed
- Updating line endings from `CRLF` to `LF`

## [1.1.0] - 2020-01-23
### Added
- New convenience class to set foreground colors `lfischer\cli\Color\FG`
- New convenience class to set background colors `lfischer\cli\Color\BG`
- New class to style output (like **bold** or __underline__) `lfischer\cli\Style`
- Foreground `RESET` constant (alias of `NONE`)
- Background `RESET` constant (alias of `NONE`)

### Changed
- Changed PHP requirement to `>=7.1`

## [1.0.0] - 2020-01-22
### Added
- New class to set foreground colors `lfischer\cli\ForegroundColor`
- New class to set background colors `lfischer\cli\BackgroundColor`
- New class to set the cursor `lfischer\cli\Cursor`
- New class to erase stuff `lfischer\cli\Erase`
