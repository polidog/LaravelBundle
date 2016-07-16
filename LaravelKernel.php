<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2016/07/17.
 */

namespace Polidog\LaravelBundle;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Application;

class LaravelKernel implements Kernel
{
    /**
     * @var Kernel
     */
    private $kernel;

    /**
     * @var Application
     */
    private $app;

    /**
     * LaravelKernel constructor.
     *
     * @param string $bootstrapFile
     */
    public function __construct(Bootstrap $bootstrap)
    {
        $this->app = $bootstrap->load();
        $this->kernel = $this->app->make(Kernel::class);
    }

    /**
     * {@inheritdoc}
     */
    public function handle($request)
    {
        return $this->kernel->handle($request);
    }

    /**
     * {@inheritdoc}
     */
    public function terminate($request, $response)
    {
        $this->kernel->terminate($request, $response);
    }

    /**
     * {@inheritdoc}
     */
    public function getApplication()
    {
        return $this->app;
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap()
    {
        // no support.
    }

}
