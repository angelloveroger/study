<?php

	/**扩展配置
	 * 需要在常规配置单独新建文件夹conf的情况下
	 * 在常规配置文件夹conf下新建extra文件夹，
	 * 再在其中添加*.php文件进行配置，文件名会作为扩展配置的键返回
	 */
	return [
		'config_name'=>'扩展配置',
		'path'=>'/conf/extra/user.php',
		'user_name' => 'roger',
		'sex'		=>  'man',
		'age'		=>  30

	];