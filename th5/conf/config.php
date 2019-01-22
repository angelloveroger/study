<?php
/**
 * Created by Roger.
 * User: roger
 * Date: 2018/11/29
 * Time: 9:46
 */
use think\Env;
return array(
    'app_debug'    => true,
    // 场景配置：再在同级目录新建office.php进行配置
    'app_status'   => Env::get('state', 'home')

);