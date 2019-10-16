<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/9/10
 * Time: 11:54
 */
namespace app\admin\controller;

use think\Config;

class Index extends Common{

    public function index(){dump(Config::get('app_debug'));
        dump(Config::get('database'));
    }
}