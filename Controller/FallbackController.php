<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2016/07/16.
 */

namespace Polidog\LaravelBundle\Controller;

use Polidog\LaravelBundle\Environment;
use Polidog\LaravelBundle\LaravelKernel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Illuminate\Http\Request as IlluminateRequest;

/**
 * @Route(service="polidog_laravel_fallback.controller.fallback")
 */
class FallbackController
{
    protected $env;

    protected $laravelKernel;

    public function __construct(Environment $env, LaravelKernel $laravelKernel)
    {
        $this->env = $env;
        $this->laravelKernel = $laravelKernel;
    }

    public function fallback()
    {
        // env
        $this->env->put();

        $request = IlluminateRequest::capture();
        $response = $this->laravelKernel->handle($request);
        $this->laravelKernel->terminate($request, $response);

        return $response;
    }
}
