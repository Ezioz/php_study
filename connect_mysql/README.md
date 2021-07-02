# 简介

参考链接：

> https://www.runoob.com/mysql/mysql-connection.html

**个人学习记录，无参考价值！！！**

# MySQL连接

## PHP连接MySQL

```
mysqli_connect(host, username, password, dbname, port, socket);
```

| 参数       | 描述                                        |
| ---------- | ------------------------------------------- |
| *host*     | 可选。规定主机名或 IP 地址。                |
| *username* | 可选。规定 MySQL 用户名。                   |
| *password* | 可选。规定 MySQL 密码。                     |
| *dbname*   | 可选。规定默认使用的数据库。                |
| *port*     | 可选。规定尝试连接到 MySQL 服务器的端口号。 |
| *socket*   | 可选。规定 socket 或要使用的已命名 pipe。   |

PHP使用`mysqli_connect`连接数据库，连接失败返回false。

低版本的时候很多使用`mysql_connect()`，但现在多已被废弃了。

# 创建数据库

使用`create`命令创建数据库。

```
CREATE DATABASE 数据库名;
```

## 使用PHP创建数据库

```
mysqli_query(connection,query,resultmode);
```

| 参数         | 描述                                                         |
| ------------ | ------------------------------------------------------------ |
| *connection* | 必需。规定要使用的 MySQL 连接。                              |
| *query*      | 必需，规定查询字符串。                                       |
| *resultmode* | 可选。一个常量。可以是下列值中的任意一个：  MYSQLI_USE_RESULT（如果需要检索大量数据，请使用这个） 	MYSQLI_STORE_RESULT（默认） |

PHP使用`mysqli_query`函数来创建或删除MySQL数据库。

# 删除数据库

`drop`命令删除数据库。

```
drop database <数据库名>;
```

## 使用PHP删除数据库

PHP删除数据库使用的函数是`mysqli_query()`函数。

# 选择数据库

`use`命令选择数据库，数据库名区分大小写。

## 使用PHP选择数据库

```
mysqli_select_db(connection,dbname);
```

| 参数         | 描述                            |
| ------------ | ------------------------------- |
| *connection* | 必需。规定要使用的 MySQL 连接。 |
| *dbname*     | 必需，规定要使用的默认数据库。  |

PHP使用函数`mysqli_select_db`选择数据库，执行成功返回true，失败返回false。

# MySQL数据类型

MySQL支持多种类型，大致可以分为三类：数值、日期/时间和字符串(字符)类型。

这一段直接垮掉，还是直接看原链接吧。

> https://www.runoob.com/mysql/mysql-data-types.html

# 创建数据表

创建数据表需要以下信息：

* 表名
* 表字段名
* 定义每个表字段

```
CREATE TABLE table_name (column_name column_type);
```

```
// 示例
CREATE TABLE IF NOT EXISTS `runoob_tbl`(
   `runoob_id` INT UNSIGNED AUTO_INCREMENT,
   `runoob_title` VARCHAR(100) NOT NULL,
   `runoob_author` VARCHAR(40) NOT NULL,
   `submission_date` DATE,
   PRIMARY KEY ( `runoob_id` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

解析：

* 如果你不想字段为NULL，可以设置字段属性为NOT NULL，在操作数据库时如果输入该字段的数据为NULL，则会报错
* AUTO_INCREMENT定义列为自增属性，一般用于主键，数值会自动加1
* PRIMARY KEY关键字用于定义列为主键，可以使用多列来定义主键，列间以逗号分隔
* ENGINE设置存储引擎，CHARSET设置编码

所有示例中使用的数据库名`awvs`，表名`awvs_test`。创建表：

```mysql
create table if not exists `awv_test`(`id` int unsigned auto_increment,`awv_title` varchar(100) not null,`awv_author` varchar(100) not null,primary key(`id`))engine=innodb default charset=utf8;
```

## 使用PHP脚本创建数据表

创建数据表使用的仍然是`mysqli_query()`函数。

tips：注意创建的表名和字段名使用的是 `` 反引号。

# 删除数据表

```
DROP TABLE table_name ;
```

## 使用PHP删除数据表

PHP删除数据表使用的函数是`mysqli_query()`函数。

# 插入数据

MySQL 表中使用 **INSERT INTO** SQL语句来插入数据。

```
INSERT INTO table_name ( field1, field2,...fieldN )
                       VALUES
                       ( value1, value2,...valueN );
```

如果数据是字符型，必须使用单引号或者双引号，如"value"。

```
INSERT INTO runoob_tbl (runoob_title, runoob_author, submission_date) VALUES ("学习 PHP", "菜鸟教程", NOW());
```

## 使用PHP插入数据

使用PHP 的 mysqli_query() 函数来执行 **SQL INSERT INTO**命令来插入数据。

主键（id）自动生成？

# 查询数据

MySQL 数据库使用SQL SELECT语句来查询数据。

```
SELECT column_name,column_name
FROM table_name
[WHERE Clause]
[LIMIT N][ OFFSET M]
```

* 查询语句中可以使用一个或多个表，表之间使用英文逗号分隔，并使用where语句来设定查询条件
* select命令可以读取一条或多条命令
* 可以使用\*代替其他字段，select语句会返回表的所有字段数据
* 可以使用where语句来包含任何条件
* 可以使用limit属性来设定返回的记录数
* 可以通过offset指定select语句开始查询的数据偏移量，默认偏移量为0

## 通过PHP获取数据

使用 PHP 函数的 mysqli_query() 及 SQL SELECT 命令来获取数据。

该函数用于执行 SQL 命令，然后通过 PHP 函数 mysqli_fetch_array()  来使用或输出所有查询的数据。

mysqli_fetch_array()  函数从结果集中取得一行作为关联数组，或数字数组，或二者兼有返回根据从结果集取得的行生成的数组，如果没有更多行则返回 false。

> 注意：记住如果你需要在字符串中使用变量，请将变量置于花括号。
>
> 在上面的例子中，PHP mysqli_fetch_array() 函数第二个参数为 **MYSQLI_ASSOC**， 设置该参数查询结果返回关联数组，你可以使用字段名称来作为数组的索引。
>
> PHP 提供了另外一个函数 **mysqli_fetch_assoc()**, 该函数从结果集中取得一行作为关联数组。 返回根据从结果集取得的行生成的关联数组，如果没有更多行，则返回 false。

也可以使用常量 MYSQLI_NUM 作为 PHP mysqli_fetch_array() 函数的第二个参数，返回数字数组。

## 内存释放

执行完 SELECT 语句后，释放游标内存是一个很好的习惯。可以通过 PHP 函数 mysqli_free_result() 来实现内存的释放。

# where子句

```
SELECT field1, field2,...fieldN FROM table_name1, table_name2...
[WHERE condition1 [AND [OR]] condition2.....
```

* 查询语句中可以使用一个或多个表，表之间使用英文逗号分隔，并使用where语句来设定查询条件。
* 可以在where子句中指定任何条件
* 可以使用and 或 or 指定一个或多个条件
* where子句可以运用于sql 的 delete 或者 update命令
* where子句类似于程序语言中的 if 条件，根据MySQL表中的字段值来读取指定的数据

以下为操作符列表，可用于 WHERE 子句中。

下表中实例假定 A 为 10, B 为 20

| 操作符 | 描述                                                         | 实例                 |
| ------ | ------------------------------------------------------------ | -------------------- |
| =      | 等号，检测两个值是否相等，如果相等返回true                   | (A = B) 返回false。  |
| <>, != | 不等于，检测两个值是否相等，如果不相等返回true               | (A != B) 返回 true。 |
| >      | 大于号，检测左边的值是否大于右边的值, 如果左边的值大于右边的值返回true | (A > B) 返回false。  |
| <      | 小于号，检测左边的值是否小于右边的值, 如果左边的值小于右边的值返回true | (A < B) 返回 true。  |
| >=     | 大于等于号，检测左边的值是否大于或等于右边的值, 如果左边的值大于或等于右边的值返回true | (A >= B) 返回false。 |
| <=     | 小于等于号，检测左边的值是否小于或等于右边的值, 如果左边的值小于或等于右边的值返回true | (A <= B) 返回 true。 |

使用主键作为where子句的条件查询非常快速；如果给定的条件在表中没有任何匹配记录，那么查询不会返回任何数据。

```mysql
select * from awv_test where BINARY awv_author='RUNOOB.com';
```

 **BINARY** 关键字，是区分大小写的，如果不使用，`runoob.com`也是能查询到数据的。

## 使用PHP读取数据

使用 PHP 函数的 mysqli_query() 及相同的 SQL SELECT 带上 WHERE 子句的命令来获取数据。

语句中加入了where，其余内容跟上面获取数据差不多。

# MySQL预处理语句

用来防止SQL注入。

预处理语句用于执行多个相同的SQL语句，并且执行效率更高。

主要优点有：

* 预处理语句大大减少了分析时间，只做了一次查询（虽然语句多次执行）
* 绑定参数减少了服务器带宽，只需要发送查询的参数，而不是整个语句
* 预处理语句针对SQL注入非常有用，因为参数值发送后使用不同的协议，保证了数据的合法性。

代码示例：

```mysql
insert into awv_test(awv_title, awv_author) values (?, ?)
```

```php
$stmt = $conn->prepare('insert into awv_test(awv_title, awv_author) values (?, ?)');
```

语句中使用`?`作为替换符，可以将问号替换为`整型、字符串、双精度浮点型和布尔值`。还需要使用`bind_param()`函数绑定SQL的参数。

```php
$stmt -> bind_param("ss", $awv_title, $awv_author);
```

该函数绑定了数据库的参数，并告诉数据库参数的值，`ss`参数列处理参数的数据类型，`s`字符告诉数据库为字符串，参数有以下四种类型：

* i - integer（整型）
* d - double（双精度浮点型）
* s - string（字符串）
* b - BLOB（binary large object）二进制大对象

每个参数都需要指定类型。通过告诉数据库参数的数据类型，可以降低 SQL 注入的风险。

# 更新数据库中的数据

`update`语句用于更新数据表中已存在的记录。

```mysql
UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value
```

where子句规定了哪些记录需要更新，如果省去where子句，所有的记录都会被更新。

# 删除数据库中的数据

delete语句用于从数据库表中删除行。

```mysql
DELETE FROM table_name
WHERE some_column = some_value
```

where子句规定了哪些记录需要删除，如果省去where子句，那么所有的记录都会被删除。
