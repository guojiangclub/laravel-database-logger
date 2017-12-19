## Laravel Database Logger

Log database query sql in Laravel Application.

因为实际项目需求才开发此功能包，如果要单纯的记录Laravel Database Query Log 是非常简单的，网上也有非常多的教程，可以自行搜索。

在 web 下，可以使用 Laravel Debugger 包来进行查看当前页面执行的SQL，可以不使用此包。


### 需求

1. 记录后台管理系统操作员的操作记录，核心是记录增，改，删操作。
2. API 请求。

> Laravel debugger 未发现记录 API 请求 SQL 执行语句和时长，在 POSTMAN 中是无法分析 SQL 执行语句和效率的，有时候为了优化性能，需要知道每个功能点执行的SQL语句和时长。

### Feature
1. 只支持文件记录
2. 支持区分 Guard
3. 记录执行用户
4. 支持记录指定 SQL 类型（SELECT,INSET INTO,UPDATE,DELETE）


### 使用

1. `composer require ibrand/DatabaseLogger`
2. add `iBrand\DatabaseLogger\ServiceProvider::class` to section `providers` of  `config/app.php` file.
3. add `databaselogger` middleware to route.

