-- mysql 当天0点时间戳
select UNIX_TIMESTAMP(CAST(SYSDATE() AS DATE));

-- mysql 当天24点时间戳
select UNIX_TIMESTAMP(CAST(SYSDATE() AS DATE) + INTERVAL 1 DAY);

-- 1.查询m表存在而mi表不存在的数据
select * from member m where not exists (select 1 from member_info mi where m.id=mi.uid);

-- 2.添加表备注
ALTER TABLE table_name COMMENT ‘新的表备注’;

-- 3.添加字段
ALTER TABLE table_name ADD column_name INT(11);

-- 4.删除字段
ALTER TABLE table_name DROP column_name;

-- 5.修改字段名称
ALTER TABLE table_name CHANGE old_column_name new_column_name INT(11) NOT NULL DEFAULT ‘123’;

-- 6.修改字段中备注
ALTER TABLE table_name MODIFY COLUMN column_name tinyint(3) COMMENT '新的字段备注';

-- 7.修改字段属性
ALTER TABLE table_name MODIFY column_name INT(11) NOT NULL DEFAULT ‘123’;

-- 8.添加默认值
ALTER TABLE table_name ALTER column_name SET DEFAULT ‘添加默认值’；

-- 9.删除默认值
ALTER TABLE table_name column_name DROP DEFAULT;

-- 10.添加主键
ALTER TABLE table_name ADD PRIMARY KEY(id);

-- mysql数据库中IP存储 int(10) unsigned not null (MYSQL中ip转INT：INET_ATON(ip); INT转ip：INET_NTOA(ip)   PHP中ip转INT：ip2long(ip); INT转ip：long2ip(ip)) 


-- ------------------------------------------------------------------存储过程------------------------------------------------------------------------------------------------------------------------------------------------------------
-- 创建IN类型存储过程
DELIMITER //
CREATE PROCEDURE delById (IN orderId INT UNSIGNED)
BEGIN
 DELETE FROM yang_orders WHERE orders_id = orderId;
END // 
DELIMITER ;
-- 调用IN类型存储过程
CALL delById (5);

-- 创建IN OUT类型存储过程
DELIMITER //
CREATE PROCEDURE delAndSelCount (
 IN orderId INT UNSIGNED,
 OUT count INT UNSIGNED
)
BEGIN
 DELETE FROM yang_orders WHERE orders_id = orderId;
 SELECT count(*) FROM yang_orders INTO count;
END // 
DELIMITER ;
-- 调用IN OUT类型存储过程
CALL delAndSelCount (6, @count);

-- 删除存储过程
DROP PROCEDURE delById;

-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



-- mysql优化相关
-- 是否记录没有使用索引的sql
show variables like 'log_queries_not_using_indexes%';
-- 慢查询时间设置
show variables like 'long_query_time%';
-- 是否开启慢查询日志
show variables like 'slow_query_log';
-- 设置慢查询日志保存位置
set global slow_query_log_file='/home/mysql/sql_log/mysql_slow.log';
-- 是否将没有使用索引的sql记录下来
set global log_queries_not_using_indexes=on;	
-- 将查询时间超过1秒的sql记录下来
set global long_query_time=1;	
-- 开启慢查询
set global slow_query_log=on;













