# webman weather plugin

the GaoDe weather library for webman plugin

<p align="center">:rainbow: 基于高[高德开放平台](https://lbs.amap.com/dev/id/newuser)的天气信息插件。</p>

## 安装

```sh
composer require casbin/webman-permission
```

## 使用

### 配置

在使用本扩展之前，你需要去 [高德开放平台](https://lbs.amap.com/dev/id/newuser) 注册账号，然后创建应用，获取应用的 API Key。

### 获取实时天气

```php
$response = $weather->getLiveWeather('深圳');
```

### 获取近期天气预报

```php
$response = $weather->getLiveWeather('深圳');
```