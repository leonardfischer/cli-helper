# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

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
