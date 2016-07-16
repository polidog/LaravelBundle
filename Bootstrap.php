<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2016/07/17.
 */

namespace Polidog\LaravelBundle;

use Illuminate\Contracts\Foundation\Application;
use Polidog\LaravelBundle\Exception\FallbackException;

class Bootstrap
{
    /**
     * @var string
     */
    private $bootstrapFile;

    /**
     * @var Application
     */
    private $app;

    /**
     * Bootstrap constructor.
     *
     * @param string $bootstrapFile
     */
    public function __construct($bootstrapFile)
    {
        $this->bootstrapFile = $bootstrapFile;

    }

    public function load()
    {
        if ($this->app === null) {
            if (!file_exists($this->bootstrapFile)) {
                throw new FallbackException('Bootstrap file not found. '.$this->bootstrapFile);
            }
            $this->app = require $this->bootstrapFile;
        }

        return $this->app;
    }

}
