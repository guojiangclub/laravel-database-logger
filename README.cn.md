# Laravel Database Logger

支持 Guard、Auth、多文件的数据库日志工具

[![Build Status](https://travis-ci.org/ibrandcc/laravel-database-logger.svg?branch=master)](https://travis-ci.org/ibrandcc/laravel-database-logger)
[![Build Status](https://scrutinizer-ci.com/g/ibrandcc/laravel-database-logger/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ibrandcc/laravel-database-logger/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ibrandcc/laravel-database-logger/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ibrandcc/laravel-database-logger/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/ibrand/laravel-database-logger/v/stable)](https://packagist.org/packages/ibrand/laravel-database-logger)
[![Latest Unstable Version](https://poser.pugx.org/ibrand/laravel-database-logger/v/unstable)](https://packagist.org/packages/ibrand/laravel-database-logger)
[![License](https://poser.pugx.org/ibrand/laravel-database-logger/license)](https://packagist.org/packages/ibrand/laravel-database-logger)


## 特性

1. 日志文件区分匿名用户和 Guard.
2. 记录执行用户
3. 记录 request url
4. 支持记录指定 SQL 语句类型(SELECT,INSET INTO,UPDATE,DELETE,ALTER TABLE etc.)
5. 单独记录 slow sql.

## 安装

```
composer require ibrand/laravel-database-logger:~1.0 -vvv
```

**低于 Laravel5.5 版本**

在 `config/app.php` 文件中 'providers' 添加

```
iBrand\DatabaseLogger\ServiceProvider::class
```

发布配置文件

`php artisan vendor:publish --provider="iBrand\DatabaseLogger\ServiceProvider" `


## 使用

### 开启日志功能

- 设置 `log_queries=>true` 在 `config/ibrand/dblogger.php` 配置文件中.
- 设置  `DB_LOG_QUERIES = true` 在 `.env` 文件中.

### 使用 `databaselogger` 中间件 

```
Route::get('test', 'Controller@index')->middleware('databaselogger');
```
关于路由设置中间件请见官方文档

[laravel-routing](https://laravel.com/docs/5.5/routing#route-group-middleware)

## 效果

![snapshot_1515552729718.png](https://note.youdao.com/yws/public/resource/59a59be278b1e0604684ed422875099c/xmlnote/E8B042EEF01446589326A7A4FF016C65/9459)
![snapshot_1515552729719.png](https://note.youdao.com/yws/public/resource/59a59be278b1e0604684ed422875099c/xmlnote/46ABB7598DAB429BBB4C2A722298B0FC/9462)
![snapshot_1515552729720.png](https://note.youdao.com/yws/public/resource/59a59be278b1e0604684ed422875099c/xmlnote/3F4BA3E7B2B4481BA8E5AA0AA702DDF6/9465)

## 贡献源码

如果你发现任何错误或者问题，请[提交ISSUE](https://github.com/ibrandcc/laravel-database-logger/issues)

