<?php

namespace app\index\controller;

// 应用目录下的common为公共类库，不可以直接访问
// 需要引入common模块中的控制器并起别名，然后实例化类得到对象，通过对象调用属性和方法
use app\common\controller\Index as commonIndex;

// Config类应用
// 1.引入然后使用   use think\Config;   Config::get();
// 2.直接路径调用   \think\Config::get();
use think\Config;

class Index
{

    public function index() {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }

    
    /**应用目录/common中类的调用
     * [useCommon description]
     * @return [type] [description]
     */
    public function useCommon() {
			$common = new commonIndex();
			$common->index();
	}


	/**think/Config类库的调用
	 * [useConfig description]
	 * @return [type] [description]
	 */
	public function useConfig() {
		$res = Config::get();          		// 1.引入然后使用
		$res = \think\Config::get();		// 2.直接路径调用
		Config::set('user', 'hellokitty');	// 设置    Config::set(配置，值[，作用域])
		Config::get('user');	        // 获取配置。存在返回相应的值，不存在返回NULL   Config::get(配置[, 作用域])
		Config::has('user');				// 判断配置是否存在，返回bool(配置项为NULL时，也返回false)


		dump($res);
	}

}
