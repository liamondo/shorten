<p align="center">
    <img src="https://github.com/liamondo/shorten/blob/main/public/logo.svg?raw=true" width="400">
</p>
<p align="center">
<img src="https://github.com/liamondo/shorten/actions/workflows/laravel.yml/badge.svg" alt="Build Status">
<img src="https://img.shields.io/github/v/tag/liamondo/shorten?label=release" alt="Lastest Release">
<a href="https://shorten.ondo.dev"><img src="https://img.shields.io/badge/Demo-shorten.ondo.dev-blue" alt="Demo"></a>
</p>

## About Shortening

Shorten is URL shortener built with Laravel PHP and Laravel Livewire.

## Features

- Light and dark themes (auto selected by browser preference)
- Shorten link to link with short base62 code
- Avoid duplicate links by returning existing short link when duplicate original links are requested
- Track stats for links such as: number of times short link requested and number of times short link followed
  - Viewable by adding /stats to the end of a short link (eg. https://s.ondo.dev/1/stats)
- Unit tests, feature tests, and continuous interaction tests

## Screenshots

<img src="https://cdn.ondo.dev/shorten/Screenshot%202022-01-30%20at%2017.25.29.png" />
<img src="https://cdn.ondo.dev/shorten/Screenshot%202022-01-30%20at%2020.39.38.png" />
<img src="https://cdn.ondo.dev/shorten/Screenshot%202022-01-30%20at%2017.25.57.png" />
<img src="https://cdn.ondo.dev/shorten/Screenshot%202022-01-30%20at%2017.26.15.png" />
<img src="https://cdn.ondo.dev/shorten/Screenshot%202022-01-30%20at%2017.26.30.png" />

## Requirements

- PHP 7.4 or higher
- Composer
- NPM
- Database (MySQL, PostgreSQL, etc)

## Installation

1. Close the GitHub repository
```bash
git clone https://github.com/liamondo/shorten.git
```

2. Copy `.env.example` to `.env`

3. Install dependencies and compile
```bash
composer install
npm install
npm run dev
```
4. Migrate the database
```bash
php artisan migrate
```

To view the project you can run `php artisan serve` or use a local web server. 

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
<a href="https://choosealicense.com/licenses/mit/">MIT</a>
