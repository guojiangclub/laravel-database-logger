## Laravel Database Logger


### Why

1. iBrand 是一个电商 + 新零售的交易类产品，所以对金额数据比较敏感。对于后台管理的操作需要进行操作日志，主要用于追踪操作记录。
2. iBrand 产品包含 H5微商城（VUE），小程序，导购小程序端，因此是前后端完全分离的，在这种情况下，没有一个跟踪分析 API SQL 执行效率的工具。特别是后期需求越来越复杂，使用 Laravel Eloquent ORM 是非常方便，但也容易造成性能问题。而 Laravel debugger 只适用于 web 应用。因此需要个工具来分析每个请求产生的 SQL 执行语句和执行效率。


### Feature

1. 日志文件区分匿名用户和 Guard.
2. 记录执行用户
3. 记录 request url
4. 支持记录指定 SQL 语句类型(SELECT,INSET INTO,UPDATE,DELETE,ALTER TABLE etc.)
5. 单独记录 slow sql.

### 安装

```
composer require ibrand/laravel-database-logger:~1.0 -vvv
```

**低于 Laravel5.5 版本**

在 `config/app.php` 文件中 'providers' 添加

```
iBrand\DatabaseLogger\ServiceProvider::class
```

`php artisan vendor:publish --provider="iBrand\DatabaseLogger\ServiceProvider" `


### 使用

1. add `databaselogger` middleware to route.
2. set `log_queries=>true` in `config/ibrand/dblogger.php` file. or set  `DB_LOG_QUERIES = true` in `.env` file.

### 效果

![snapshot_1515552729718.png](https://note.youdao.com/yws/public/resource/59a59be278b1e0604684ed422875099c/xmlnote/E8B042EEF01446589326A7A4FF016C65/9459)
![snapshot_1515552729719.png](https://note.youdao.com/yws/public/resource/59a59be278b1e0604684ed422875099c/xmlnote/46ABB7598DAB429BBB4C2A722298B0FC/9462)
![snapshot_1515552729720.png](https://note.youdao.com/yws/public/resource/59a59be278b1e0604684ed422875099c/xmlnote/3F4BA3E7B2B4481BA8E5AA0AA702DDF6/9465)



