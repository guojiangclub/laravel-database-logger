## Laravel Database Logger

因实际需求开发此功能包，实际需求如下：

1. 管理后台管理员操作记录，比如数据的增，改，删等操作。
2. API 的 SQL 执行记录，方便分析 SQL 执行效率。 

主要实现如下功能：

1. 日志文件区分匿名用户和 Guard 类型。
2. 记录执行用户
3. 支持记录指定 SQL 语句类型（SELECT,INSET INTO,UPDATE,DELETE,ALTER TABLE etc.）

### 安装

```
composer require ibrand/laravel-database-logger:~1.0 -vvv
```

**低于 Laravel5.5 版本**

在 `config/app.php` 文件中 'providers' 添加

```
Ibrand\DatabaseLogger\ServiceProvider::class
```

`php artisan vendor:publish --provider="Ibrand\DatabaseLogger\ServiceProvider" `


### 使用

1. add `databaselogger` middleware to route.
2. set `log_queries=>true` in `config/ibrand/dblogger.php` file.

### 其他参考

//TODO::
