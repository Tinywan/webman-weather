<?php
/**
 * @desc Weather.php 描述信息
 * @author Tinywan(ShaoBo Wan)
 * @date 2022/4/12 19:28
 */
declare(strict_types=1);


namespace tinywan;


use GuzzleHttp\Client;
use tinywan\exception\HttpException;
use tinywan\exception\InvalidArgumentException;

class Weather
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var array
     */
    protected $guzzleOptions = [];

    /**
     * Weather constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return new Client($this->guzzleOptions);
    }

    /**
     * @param array $options
     */
    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    /**
     * @param string $city
     * @param string $format
     * @return mixed|string
     */
    public function getLiveWeather(string $city, string $format = 'json')
    {
        return $this->getWeather($city, 'base', $format);
    }

    /**
     * @param string $city
     * @param string $format
     * @return mixed|string
     */
    public function getForecastsWeather(string $city, string $format = 'json')
    {
        return $this->getWeather($city, 'all', $format);
    }

    /**
     * @param string $city
     * @param string $type
     * @param string $format
     * @return mixed|string
     */
    public function getWeather(string $city, string $type = 'base', string $format = 'json')
    {
        $url = 'https://restapi.amap.com/v3/weather/weatherInfo';
        if (!\in_array(\strtolower($format), ['xml', 'json'])) {
            throw new InvalidArgumentException('Invalid response format: '.$format);
        }

        if (!\in_array(\strtolower($type), ['base', 'all'])) {
            throw new InvalidArgumentException('Invalid type value(base/all): '.$type);
        }

        $format = \strtolower($format);
        $type = \strtolower($type);

        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'output' => $format,
            'extensions' => $type,
        ]);

        try {
            $response = $this->getHttpClient()->get($url, [
                'query' => $query,
            ])->getBody()->getContents();
            return 'json' === $format ? \json_decode($response, true) : $response;
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }
}