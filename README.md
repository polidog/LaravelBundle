# LaravelBundle

<img src="/Resources/doc/img/fallback.png" alt="LaravelFallback" />


[![Build Status](https://travis-ci.org/polidog/LaravelBundle.svg?branch=master)](https://travis-ci.org/polidog/LaravelBundle)

## Requirements

- PHP 5.6+
- Symfony 2.3+
- Laravel 5.1+

## Installation

install `polidog/laravel-bundle` with composer.

```
$ composer require polidog/laravel-bundle
```

## Usage

Load bundle in AppKernel:

```
    new \Polidog\LaravelBundle\PolidogLaravelBundle(),
```

Configuration in config.yml:


```
polidog_laravel:
  bootstrap_file: "%kernel.root_dir%/../vendor/polidog/laravel-project/bootstrap/app.php" #your laravel project for bootstrap/app.php
  env:
    APP_DEBUG: true
    APP_KEY: laravelKey
```


Fallback in routing.yml

```
fallback:
    path: /{path}
    defaults: { _controller: "polidog_laravel.controller.fallback:fallback" }
    requirements:
        path: .*
```


## example

see [polidog/laravel-bundle-example](https://github.com/polidog/laravel-bundle-example)