<?php

		
	extension_loaded('redis') ? NULL : exit('NOT EXISTS Redis');
	$redis = new redis();//var_dump($redis);exit;
	$redis -> connect('127.0.0.1', 6379) or exit('CONNECT HOST ERROR!');
	$redis -> auth('roger');
	

	/*string   key=>value(string/int/float)
		set string roger   设置
		get string 		   获取
		del string 		   删除
		incr 5 			   int类型递减1
		decrby 5 3 		   int类型减法
	*/


	/*list   key=>[val1,val2,val1........](string/int/float) 
	list并不要求队列中元素是唯一的，区别于set类型
		lpush list 12  		往list队列左边压入一个元素
		rpop list 			从list队列右边弹出一个元素
		（lpush rpop 即队列的先进先出）
		llen list     		获取队列中元素的个数
	*/


	/*set   key=[val1,val2,val3......](string/int/float)set
	要求里面的元素唯一，区别于list类型
		sadd set 12  	 	往set中插入元素
		srem set 12 	 	删除set中的元素
		sismember set 12 	查看元素是否在set中，返回1或者0
		scard set 		 	获取set中元素的个数	
	 */
	

	/*hash   key=[key1=val1,key2=val2......]
	要求里面元素key唯一，值可以一样
		hset hash name roger 	设置元素
		hget hash name 			获取元素
		hmget hash name age 	获取多个元素
	 */
	
	
	/*sort set   key=[score1=value1=rank1,score2=value2=rank2]
	zadd zset key1 val1 		 	设置元素
	zrange zset 0 3 [withscores]	获取第一到第四个元素 并显示他们的分数
	zcard zset 						获取元素的个数
	zrank zset val1 				查看元素排名

	 */