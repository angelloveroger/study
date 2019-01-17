<?php

	/**场景配置
	 * 需要在常规配置单独新建文件夹conf的情况下
	 * 在常规配置文件config.php中修改app_status选项，
	 * 再在conf下新建与app_status值一样的php文件，然后再在文件中配置
	 */
	return [
		'database'  =>   [
			// 服务器地址
		    'hostname'        => 'localhost_home',
		    // 数据库名
		    'database'        => 'roger_mysql',
		    // 数据库用户名
		    'username'        => 'root',
		]
	];