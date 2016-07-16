<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude("DependencyInjection")
    ->exclude("Tests")
    ->in(__DIR__)
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->finder($finder)
    ->fixers(['-braces', '-visibility'])
;