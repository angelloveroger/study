<?php

	namespace app\index\controller;

	class Helper{

		public function index() {
			echo 'index/controller/index';
		}

		/**config助手函数的使用
		 * [useConfig description]
		 * @return [type] [description]
		 */
		public function useConfig() {
			$res = config();
			config('user', 'helloworld');	// 设置  config(配置，值[，作用域]);
			config('user');			// 获取配置。存在返回相应的值，不存在返回NULL  config(配置[, 作用域])
			config('?user');		// 判断配置是否存在，返回bool(配置项为NULL时，也返回false)
			dump($res);
		}




	}