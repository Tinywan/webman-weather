<?php
/**
 * @desc Weather.php 描述信息
 * @author Tinywan(ShaoBo Wan)
 * @date 2022/4/12 19:28
 */
declare(strict_types=1);


namespace tinywan;

use tinywan\provider\WeatherProvider;
use Webman\Bootstrap;
use Workerman\Worker;

/**
 * @see \tinywan\provider\WeatherProvider
 * @mixin Weather
 * @method static liveWeather(string $name) 实况天气数据信息
 * @method static forecastsWeather(string $name) 预报天气信息数据
 */

class Weather implements Bootstrap
{
    /**
     * @var null
     */
    protected static $_provider = null;

    /**
     * @desc: start 描述
     * @param Worker $worker
     * @return void
     * @author Tinywan(ShaoBo Wan)
     */
    public static function start($worker)
    {
        if ($worker) {
            $config = config('plugin.tinywan.weather.app.weather');
            static::$_provider = new WeatherProvider($config['key']);
        }
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return static::$_provider->{$name}(...$arguments);
    }
}