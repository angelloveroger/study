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



			dump($res);
		}




	}