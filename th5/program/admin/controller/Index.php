<?php
/**
 * Created by Roger.
 * User: roger
 * Date: 2018/12/3
 * Time: 10:32
 */

namespace app\admin\controller;

use think\Controller;
use app\admin\model\User;

class Index extends Controller{

    public function index(){

        $res = User::get(5);
        $res = \think\Config::get('database');



        dump($res);
    }
}