<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2016/07/17
 */

namespace Polidog\LaravelBundle\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel;

use Phake;
use Polidog\LaravelBundle\Bootstrap;
use Polidog\LaravelBundle\LaravelKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class LaravelKernelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function executeHandle()
    {
        $kernelMock = Phake::mock(Kernel::class);
        $bootstrap = $this->getBootstrapMock($kernelMock);

        $kernel = new LaravelKernel($bootstrap);
        $request = new Request();
        $kernel->handle($request);

        Phake::verify($kernelMock)->handle($request);

    }

    /**
     * @test
     */
    public function executeTerminate()
    {
        $kernelMock = Phake::mock(Kernel::class);
        $bootstrap = $this->getBootstrapMock($kernelMock);

        $kernel = new LaravelKernel($bootstrap);
        $request = new Request();
        $response = new Response();

        $kernel->terminate($request, $response);

        Phake::verify($kernelMock)->terminate($request, $response);

    }


    private function getBootstrapMock($kernelMock)
    {
        $app = Phake::mock(Application::class);
        Phake::when($app)->make($this->anything())
            ->thenReturn($kernelMock);

        $bootstrap = Phake::mock(Bootstrap::class);
        Phake::when($bootstrap)->load()
            ->thenReturn($app);

        return $bootstrap;
    }
}