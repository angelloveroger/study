<?php

namespace app\index\controller;

    // 应用目录下的common为公共类库，不可以直接访问
// 需要引入common模块中的控制器并起别名，然后实例化类得到对象，通过对象调用属性和方法
use app\common\controller\Index as commonIndex;

// Config类应用
// 1.引入然后使用   use think\Config;   Config::get();
// 2.直接路径调用   \think\Config::get();
use think\Config;

//Env类应用
use think\Env;

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
        // 1.引入然后使用
        $res = Config::get();
        // 2.直接路径调用
        $res = \think\Config::get();
        // 设置  config(配置，值[，作用域]);  Config::set(配置，值[，作用域])
        config('user', 'helloworld');
        Config::set('user', 'hellokitty');
        // 获取配置。存在返回相应的值，不存在返回NULL  config(配置[, 作用域]);  Config::get(配置[, 作用域])
        config('user');
        Config::get('user');
        // 判断配置项是否存在，返回bool(配置项为NULL时，也返回false)
        config('?user');
        Config::has('user');

        dump($res);
    }

    /**think/Env类库
     *
     */
    public function useEnv() {
        // 获取env配置。存在返回相应的值，不存在则返回NULL
        $env = Env::get('state');
        /* 环境配置(.env)可以结合常规配置(conf/config.php)来适应不同的工作环境下不同的配置需求，比如家里，公司，线上，开发...
         1.在环境配置(.env)中添加配置项 【state=office】
         2.再在常规配置中(conf/config.php)配置 【app_status】 选项，选项的值读取环境配置(.env)中 【state】 的值
         3.项目加载时会根据环境配置(.env)中不同的 【state】 值，加载不同的配置文件
            比如当前环境变量配置的 【state=office】，项目加载的时候，会读取conf/office.php中的配置
         */

        dump($env);
    }

}
