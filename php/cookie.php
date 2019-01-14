<?php

/*setcookie($name,[$value],[$expire],[$path],[$domain],[$secure],[$httponly])
	$name   	string cookie的名字
	$value  	string cookie的值
	$expire 	int    cookie的有效时间，默认值是0，单位是秒
	$path   	string cookie的有效路径，默认当前目录以及子目录有效；也可以整个根目录/，在整个根目录下有效
	$domain 	string cookie的作用域，默认本域名下有用
	$secure 	bool   cookie是否加密传输，默认false；如果设置成true，即通过HTTPS传输
	$httponly bool   cookie访问方式，默认false；如果设置成true，客户端js不可操作cookie

	&  更新和删除cookie的时候 需要将$path和$domain设置为一样的
*/
	// 设置cookies
setcookie('name','roger');
	// 设置过期时间
setcookie('a',1234,time()+300);//设置过期时间，5分钟有效时间
setcookie('b',1234,strtotime('7 days'));//设置过期时间，1星期有效时间
	// 设置作用域
setcookie('c',1234,time()+3600,'/');//设置cookie作用域，此为根目录
setcookie('d', 'bike', time()+3600, '/', 'local.study');
print_r($_COOKIE);