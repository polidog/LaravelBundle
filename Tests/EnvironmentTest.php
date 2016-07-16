<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2016/07/17
 */

namespace Polidog\LaravelBundle\Tests {


use Polidog\LaravelBundle\Environment;
    use Polidog\LaravelBundle\State;

    class EnvironmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider environments
     */
    public function putEnvironment($key, $value)
    {
        $env = new Environment([$key => $value]);
        $env->put();
        $this->assertTrue(State::has("{$key}={$value}"));
    }


    public function environments()
    {
        return [
            ['hoge' , 'fuga'],
            ['APP_DEBUG' , true],
        ];
    }
}

}

namespace Polidog\LaravelBundle {

    class State {
        private static $value;

        public static function set($value)
        {
            self::$value = $value;
        }

        public static function has($value)
        {
            return self::$value == $value;
        }

        public static function reset()
        {
            self::$value = null;
        }
    }

    function putenv($value) {
        State::set($value);
    }
}