# webman weather plugin

:rainbow: 基于[高德开放平台](https://lbs.amap.com/dev/id/newuser)的天气信息插件

## 安装

```sh
composer require tinywan/weather
```

## 使用

### 配置

在使用本扩展之前，你需要去 [高德开放平台](https://lbs.amap.com/dev/id/newuser) 注册账号，然后创建应用，获取应用的 API Key。

### 获取实时天气

```php
$response = tinywan\Weather::liveWeather('杭州');
```
响应信息
```json
{
    "status": "1",
    "count": "1",
    "info": "OK",
    "infocode": "10000",
    "lives": [
        {
            "province": "浙江",
            "city": "杭州市",
            "adcode": "330100",
            "weather": "阴",
            "temperature": "27",
            "winddirection": "东",
            "windpower": "≤3",
            "humidity": "47",
            "reporttime": "2022-04-12 20:02:04"
        }
    ]
}
```

### 获取近期天气预报

```php
$response = tinywan\Weather::forecastsWeather('杭州');
```

响应信息
```json
{
    "status": "1",
    "count": "1",
    "info": "OK",
    "infocode": "10000",
    "forecasts": [
        {
            "city": "杭州市",
            "adcode": "330100",
            "province": "浙江",
            "reporttime": "2022-04-12 20:02:04",
            "casts": [
                {
                    "date": "2022-04-12",
                    "week": "2",
                    "dayweather": "多云",
                    "nightweather": "阴",
                    "daytemp": "33",
                    "nighttemp": "19",
                    "daywind": "东",
                    "nightwind": "东",
                    "daypower": "4",
                    "nightpower": "4"
                },
                {
                    "date": "2022-04-13",
                    "week": "3",
                    "dayweather": "中雨",
                    "nightweather": "小雨",
                    "daytemp": "22",
                    "nighttemp": "16",
                    "daywind": "西北",
                    "nightwind": "西北",
                    "daypower": "4",
                    "nightpower": "4"
                },
                {
                    "date": "2022-04-14",
                    "week": "4",
                    "dayweather": "小雨",
                    "nightweather": "小雨",
                    "daytemp": "18",
                    "nighttemp": "16",
                    "daywind": "北",
                    "nightwind": "北",
                    "daypower": "4",
                    "nightpower": "4"
                },
                {
                    "date": "2022-04-15",
                    "week": "5",
                    "dayweather": "小雨",
                    "nightweather": "小雨",
                    "daytemp": "15",
                    "nighttemp": "11",
                    "daywind": "东北",
                    "nightwind": "东北",
                    "daypower": "4",
                    "nightpower": "4"
                }
            ]
        }
    ]
}
```