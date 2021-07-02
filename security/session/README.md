# 创建数据

```mysql
create database user;
create table `user`(`id` int unsigned auto_increment,`username` varchar(100) not null unique,`password` varchar(100) not null,primary key(`id`))engine=innodb default charset=utf8;
```

用户名应当唯一，所以添加了`unique`，第一次的时候用户不唯一，添加了很多重复数据，使用`delete from user where 1=1`删除表中所有内容。

然后发现不能直接复制，因为删除表的内容表依然存在（忘了这一茬了）。使用

```mysql
alter table `user` add unique(`username`);
```

参考链接：

> https://blog.csdn.net/sinat_39308893/article/details/81069159



