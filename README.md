# LaravelBundle

[![Build Status](https://travis-ci.org/polidog/LaravelBundle.svg?branch=master)](https://travis-ci.org/polidog/LaravelBundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/polidog/LaravelBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/polidog/LaravelBundle/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/polidog/laravel-bundle/v/stable)](https://packagist.org/packages/polidog/laravel-bundle)
[![Total Downloads](https://poser.pugx.org/polidog/laravel-bundle/downloads)](https://packagist.org/packages/polidog/laravel-bundle)
[![Latest Unstable Version](https://poser.pugx.org/polidog/laravel-bundle/v/unstable)](https://packagist.org/packages/polidog/laravel-bundle)
[![License](https://poser.pugx.org/polidog/laravel-bundle/license)](https://packagist.org/packages/polidog/laravel-bundle)
[![Monthly Downloads](https://poser.pugx.org/polidog/laravel-bundle/d/monthly)](https://packagist.org/packages/polidog/laravel-bundle)
[![Daily Downloads](https://poser.pugx.org/polidog/laravel-bundle/d/daily)](https://packagist.org/packages/polidog/laravel-bundle)
[![composer.lock](https://poser.pugx.org/polidog/laravel-bundle/composerlock)](https://packagist.org/packages/polidog/laravel-bundle)

<img src="/Resources/doc/img/fallback.png" alt="LaravelFallback" />


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