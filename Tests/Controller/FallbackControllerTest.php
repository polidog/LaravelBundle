<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2016/07/16
 */

namespace Polidog\LaravelBundle\Tests\Controller;

use Phake;
use Polidog\LaravelBundle\Controller\FallbackController;
use Polidog\LaravelBundle\Environment;
use Polidog\LaravelBundle\LaravelKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FallbackControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function callFallback()
    {
        $env = Phake::mock(Environment::class);
        $laravelKernel = Phake::mock(LaravelKernel::class);

        Phake::when($laravelKernel)->handle($this->isInstanceOf(Request::class))
            ->thenReturn(new \Illuminate\Http\Response());

        $controller = new FallbackController($env, $laravelKernel);
        $controller->fallback();

        Phake::verify($env)->put();
        Phake::verify($laravelKernel)->handle($this->isInstanceOf(Request::class));
        Phake::verify($laravelKernel)->terminate(
            $this->isInstanceOf(Request::class),
            $this->isInstanceOf(Response::class)
        );
    }
}