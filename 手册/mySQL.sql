-- mysql常用语句

-- 修改字段属性。修改时如果不带完整性约束条件，原有的约束条件将丢失；如果需要保留原有的条件，则需要在修改时带上完整性约束条件【ALTER TABLE 表名 MODIFY 字段名  字段属性[完整性约束条件]】
    -- 例：将email字段 VARCHAR(50)修改成VARCHAR(200)
    ALTER TABLE user10 MODIFY email VARCHAR(200) NOT NULL DEFAULT 'a@a.com';

    -- 例：将card移到test后面
    ALTER TABLE user10 MODIFY card CHAR(10) AFTER test;

    -- 例：将test放到第一个，保留原完整性约束条件
    ALTER TABLE user10 MODIFY test CHAR(32) NOT NULL DEFAULT '123' FIRST;

 -- 修改字段名称和属性【ALTER TABLE 表名 CHANGE 原字段名 新字段名 字段类型 约束条件】
    --例：将test字段改为test1
    ALTER TABLE user10 CHANGE test test1 CHAR(32) NOT NULL DEFAULT '123';

 -- 添加删除字段【ALTER TABLE 表名 ADD/DROP 字段[完整性约束]】
    -- 例：添加email字段
    ALTER TABLE user11 ADD email VARCHAR(50);
    -- 删除email字段
    ALTER TABLE user11 DROP email;

-- 添加删除默认值【ALTER TABLE user11 ALTER 字段名 SET/DROP DEFAULT [默认值]】
    -- 例：添加age字段默认值
    ALTER TABLE user ALTER age SET DEFAULT 18;
    -- 删除age字段默认值
    ALTER TABLE user ALTER age DROP DEFAULT;

-- 添加删除主键【ALTER TABLE 表名 ADD/DROP PRIMARY KEY(字段)】
    -- 例：添加主键
    ALTER TABLE user ADD PRIMARY KEY(id[,name]);
    -- 删除主键【直接删除主键会报错，需要先删除主键自增属性】
    ALTER TABLE user MODIFY id INT UNSIGNED;
    ALTER TABLE user DROP PRIMARY KEY;

-- 添加/删除索引
    --【添加普通索引】
      -- ALTER TABLE 表名 ADD INDEX [index_name] (column_list) 【 添加普通索引，column_list可以是单列，也可以是多列，列之间可以用逗号分开，索引名可选，不填写的时候会用第一列的值代替】
      -- CREATE INDEX [index_name] ON 表名 (column_list)
    --【添加唯一索引】
      -- ALTER TABLE 表名 ADD UNIQUE (column_list)
      -- CREATE UNIQUE INDEX index_name ON 表名 (column_list);
    -- 【删除索引】
      -- ALTER TABLE 表名 DROP INDEX index_name
      -- DROP INDEX index_name ON 表名

-- 修改表存储引擎
    -- ALTER TABLE 表名 ENGINE=InnoDB/MyISAM

-- 修改表自增值
    -- ALTER TABLE 表名 AUT0_INCREMENT=50









