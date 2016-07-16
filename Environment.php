<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2016/07/16.
 */

namespace Polidog\LaravelBundle;

class Environment
{
    private $env;

    private $booted;

    /**
     * PutEnv constructor.
     *
     * @param $env
     */
    public function __construct(array $env = [])
    {
        $this->env = $env;

        $this->booted = false;
    }

    public function put()
    {
        if (!$this->booted) {
            foreach ($this->env as $key => $value) {
                putenv("{$key}={$value}");
            }
            $this->booted = true;
        }
    }

}
