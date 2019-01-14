<?php

    /*  方案一 获取接口数据（直接从数据库读取数据生成接口数据）
     *  接口地址 http://local.cms.com/app/getAppData_1.php?page=2&pagesize=5&type=xml
     */
    include_once './returnData.php';
    include_once './cacheFile.php';
    include_once './Db.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 5;
    if(!is_numeric($page) || !is_numeric($pageSize)){

        return returnData::show(401, '输入参数不合法');
    }
    $offset = ($page-1) * $pageSize;
    $arr = array();
    $cache = new cacheFile();
    if(!$arr = $cache -> cacheData('getAppData_1_'.$page.'_'.$pageSize)) {
        //  没有缓存数据，查询数据库
        $sql = "select * from goods_class where is_show=1 order by id desc limit  " . $offset . ',' . $pageSize;
        try {
            $connect = Db::getInstance()->connect();
        } catch (Exception $e) {
            return returnData::show(403, '数据库连接异常！');
        }

        $res = mysql_query($sql, $connect);

        while ($rows = mysql_fetch_assoc($res)) {
            $arr[] = $rows;
        }
        //  将查出数据生成静态缓存
        $cache->cacheData('getAppData_1_'.$page.'_'.$pageSize, $arr, 360);
    }

    if(count($arr)>0){
        return returnData::show(200, '首页数据获取成功', $arr);
    }else{
        return returnData::show(400, '首页数据获取失败', $arr);
    }