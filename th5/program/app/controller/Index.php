<?php
/**
 * Created by PhpStorm.
 * User: WIR
 * Date: 2019/6/19
 * Time: 11:02
 */
namespace app\app\controller;

use think\Db;

class Index{



    public function index(){

        return Db::table('test')->column('title, img, descri');
    }
}
