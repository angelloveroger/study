<?php

header('Content_type:text/html; charset=utf-8;');

class rogerClass{

//===============================================================文件夹遍历====================================================================================================================================================================================================================
/**遍历文件夹 打印全路径
 */
function getfiles($path){
    foreach(scandir($path) as $afile)
    {
        if($afile=='.'||$afile=='..') continue;
        if(is_dir($path.'/'.$afile))
        {
            getfiles($path.'/'.$afile);
        } else {
            echo $path.'/'.$afile.'<br />';
        }
    }
}

/**遍历文件夹,有缩进关系
 * @param string $dir 文件夹路径
 * return string
 */
function getDir($dir='', &$fileDir=''){
    if(!is_dir($dir)){
        exit('该路径不存在');
    }
    $mydir = dir($dir);
    $fileDir .=  "<ul>";
    while($file = $mydir->read()){
        if($file != '.' && $file != '..') {
            if (is_dir("$dir/$file")) {
                $fileDir .= "<li><font color='#ff00cc'><b>$file</b></font></li>";
                getDir("$dir/$file", $fileDir);
            } else {
                $fileDir .= "<li><font color='#aaa'>$file</font></li>";
            }
        }
    }
    $fileDir .= "</ul>";
    $mydir->close();
    return $fileDir;
}

/**遍历文件夹
 */
function pathDir($dirPath,$Deep=0){
   $resDir=opendir($dirPath); //资源类型
   while($basename=readdir($resDir)){
       //当前文件路径
       $path=$dirPath.'/'.$basename;
       if(is_dir($path) && $basename!='.' && $basename!='..'){
           //是目录，打印目录名，继续迭代
           echo '<b>'.str_repeat('&nbsp;',$Deep).$basename.'/</b><br/>';
           $Deep = $Deep + 2;//深度+1
           pathDir($path,$Deep);
       }else if(basename($path)!='.' && basename($path)!='..'){
           //不是文件夹，打印文件名
           echo str_repeat('&nbsp;',$Deep).basename($path).'<br/>';
       }
   }
   closedir($resDir);
}



//====================================================================验证手机和邮箱===============================================================================================================================================================================================================
/**验证邮箱
 * @param $email
 * @return bool
 */
function checkEmail($email){
    ///^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/
    $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
    if(preg_match($pattern, $email)){
        return true;
    }else{
        return false;
    }
}

/**验证手机号
 * @param $mobile
 * @return bool
 */
function checkMobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^166[\d]{8}$|^15[^4]{1}\d{8}$|^17[0,3,5,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
}



//===================================================================================================================================================================================================================================================================================
/**who is king
 *  @param int $n 人数
 *  @param int $m 报数
 *  return array
 * */
function kingCup($n=10, $m=3){
    $arr = range(1,$n);
    $i = 0;
    while(count($arr)>1){
        if(($i+1) % $m == 0){
            unset($arr[$i]);//vd($arr);//exit;
        }else{
            array_push($arr, $arr[$i]);//vd($arr);
            unset($arr[$i]);//vd($arr);exit;
        }
        $i++;
    }
    return $arr;
}

/**冒泡排序
 * @param array $arr 排序数组
 * @param int   $sort  排序方式(默认升序)
 * return array
 */
function bubbleSort($arr,$sort=1){
    $n =count($arr);
    for($j=0;$j<$n-1;$j++){
        for($i=0;$i<$n-$j-1;$i++){
            if($sort == 1){ // 升序排列，判断数组元素大小，颠倒位置
                if($arr[$i]>$arr[$i+1]){
                    $empty=$arr[$i+1];
                    $arr[$i+1]=$arr[$i];
                    $arr[$i]=$empty;
                }
            }elseif($sort == 2){ // 降序排列，判断数组元素大小，颠倒位置
                if($arr[$i]<$arr[$i+1]){
                    $empty=$arr[$i+1];
                    $arr[$i+1]=$arr[$i];
                    $arr[$i]=$empty;
                }
            }
        }
    }
    return $arr;
}

/**获取日期，星期 （格式如‘2016年12月12日 星期五’）
 * @param string $data1 年月日连接符
 * @param string $data2 年月日连接符
 * @param string $data3 年月日连接符
 * return string
 */
function getData($data1='年',$data2='月',$data3='日'){
    $dataArr = array('日','一','二','三','四','五','六');
    $week = date('w');
    return date("Y{$data1}m{$data2}d{$data3} 星期").$dataArr[$week];
}

/**写日志用的
* @param $file_name  日志名字
* @param $data       记录数据
*/
function api_log( $file_name, $data ){
    $path = './Uploads/Logs/'.date( 'Y-m' ).'/'.date( 'd' ).'/';
    if(!is_dir( $path )){
        mkdir( $path, 0777, true );
        @chmod( $path, 0777 );
    }
    $real_name = $path.$file_name;
    file_put_contents( $real_name, "\r\n=======================".date( "Y-m-d H:i:s" )."======================="."\r\n"."logs=".var_export( $data, TRUE )."\r\n\r\n\r\n", FILE_APPEND );
}



//===================================================================获取文件后缀名的N+1种方法======================================================================
//*  获取文件路径，文件名，文件后缀名
 *  @param string $file 文件路径
 *  return array
 */
function getPathInfo($file){
    $pathinfo = array(
        'dirname'   => pathinfo($file, PATHINFO_DIRNAME),
        'basename'  => pathinfo($file, PATHINFO_BASENAME),
        'extension' => pathinfo($file, PATHINFO_EXTENSION),
        );
    return $pathinfo;
}

/*strripos/strrpos(string,find [,start])  函数查找字符串在另一字符串中最后一次出现的位置,函数对大小写不敏感/函数对大小写敏感，返回字符串在另一字符串中最后一次出现的位置，如果没有找到字符串则返回 FALSE。
    string 被搜索字符串   find 查找字符串  start 开始搜索的位置
stripos/strpos(string,find [,start])  函数查找字符串在另一字符串中第一次出现的位置,函数对大小写不敏感/函数对大小写敏感，返回字符串在另一字符串中第一次出现的位置，如果没有找到字符串则返回 FALSE。
    string 被搜索字符串   find 查找字符串  start 开始搜索的位置
 */
function getExt1($string){
    $pos = strripos($string, '.');
    $ext = substr($string, $pos+1);
    return $ext;
}

/*explode(separator,string [,limit]) 函数把字符串string以分隔符separator打散为指定长度limit个数组，返回字符串的数组
    separator 分隔符   string 需要分割的字符串     limit 返回字符串长度
end(array) 函数将数组内部指针指向最后一个元素，并返回该元素的值（如果成功）
    array 数组
array_pop(array)    函数删除数组中的最后一个元素，并返回被删除的值，原始数组改变。如果数组是空的，或者非数组，将返回 NULL
    array 数组
*/
function getExt2($string){
    $stringrr = explode('.', $string);
    $ext = end($stringrr);
    return $ext;
}

function getExt3($string){
    $stringrr = explode('.', $string);
    $ext = array_pop($stringrr);
    return $ext;
}

/*pathinfo(path [,options]) 函数以数组的形式返回文件路径的信息,pathinfo数组中包含【dirname,basename,extension,filename】
    path 文件名        options 【PATHINFO_DIRNAME - 只返回dirname ；    PATHINFO_BASENAME - 只返回basename；    PATHINFO_EXTENSION - 只返回extension】
*/
function getExt4($string){
    $arr = pathinfo($string);
    $ext = $arr['extension'];
    return $ext;
}

function getExt5($string){
    $ext = pathinfo($string, PATHINFO_EXTENSION);
    return $ext;
}

/*strrchr(string,char) 函数查找字符串在另一个字符串中最后一次出现的位置，返回字符串在另一个字符串中最后一次出现的位置到主字符串结尾的所有字符。如果未找到此字符，则返回 FALSE
    string 被搜索字符串   char 查找字符串
strchr[strstr](string,search [,before_search]) 函数搜索字符串在另一字符串中的第一次出现,返回字符串的其余部分（从匹配点）。如果未找到所搜索的字符串，则返回 FALSE
    string 字符串  search 查找字符串    fefore_search 可选bool值，默认false，选true是返回查找字符串的前面部分【strstr区分大小写， stristr不区分大小写】        
substr(string,start [,length]) 返回字符串的提取部分，若失败则返回 FALSE，或者返回一个空字符串
    string 字符串  start 开始截取的位置   length 截取长度，未指定则截取到字符串末尾位置
 */
function getExt6($string){
    $string = strrchr($string, '.');
    $ext = substr($string, 1);
    return $ext;
}

function getExt7($string){
    $str = strrev($string);
    $str = strstr($str, '.', true);     //strchr($str, '.', true);
    $ext = strrev($str);
    return $ext;
}

/*strrev(string) 函数反转字符串，返回已反转的字符串
    string 字符串
*/
function getExt8($string){
    $str = strrev($string);
    $str = explode('.', $str)[0];
    $ext = strrev($str);
    return $ext;
}



//===================================================================生成随机字符串======================================================================
/**返回由字母，数字组成的随机字符串
 * @param $n 返回字符串的长度
 * @return string
 */
function str($n){
    $str = '';
    $num = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','a','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    for($i=1; $i<=$n; $i++){
        $str .= $num[mt_rand(0, count($num)-1)];
    }
    return $str;
}

/**生成随机字符串
 */
function uniqidStr($strLen=12){
    if($strLen==12 ){
        return substr(md5(microtime(true)),rand(0,25),6).substr(sha1(microtime(true)),rand(0,33),6);
    }elseif($strLen==18){
        return substr(md5(microtime(true)),rand(0,25),6).substr(sha1(microtime(true)),rand(0,33),6).substr(md5(time()),rand(0,25),6);
    }elseif($strLen==24){
        return substr(md5(microtime(true)),rand(0,25),6).substr(sha1(microtime(true)),rand(0,33),6).substr(md5(time()),rand(0,25),6).substr(sha1(time()),rand(0,33),6);
    }elseif($strLen==32){
        return md5(uniqid(microtime(true),true));
    }elseif($strLen==40){
        return sha1(uniqid(microtime(true),true));
    }
}

   
   
//===================================================================文件上传======================================================================
/*  单文件上传
 *  @param  array   $fileInfo   上传文件数组
 *  @param  array   $allowExt   允许上传的文件类型,默认（jpg,png,jpeg,gif）
 *  @param  int     $maxSize    允许上传文件大小，默认2M
 *  @param  bool    $flag       检测是否为真是的图片，默认检测
 *  @param  string  $path       存储路径，默认当前脚本uploads文件见
 *  return
 * */
function uploadOne($fileInfo, $allowExt=array('jpg','png','jpeg','gif'), $maxSize=2097152,  $flag=true, $path = 'uploads/'){
    //print_r($fileInfo);exit;
    if($fileInfo['error'] != 0){
        switch($fileInfo['error']){
            case 1:
                exit('上传文件超过了upload_max_filesize选项的值');break;
            case 2:
                exit('上传文件超过了max_file_size选项的值');break;
            case 3:
                exit('上传文件仅有部分上传');break;
            case 4:
                exit('没有选择要上传的文件');break;
            case 6:
                exit('临时目录不存在');break;
            case 7:
                exit('系统错误');break;
            case 8:
                exit('系统错误');break;
        }
    }
    // 上传文件类型
    $ext = $this->getExt($fileInfo['name']);
    // 检测上传文件类型
    if(!in_array($ext,$allowExt)){
        exit('非法上传文件类型！');
    }
    // 检测上传文件大小
    if($fileInfo['size'] > $maxSize){
        exit('上传文件过大！');
    }
    // 检测文件是否通过HTTP POST方式上传
    if(!is_uploaded_file($fileInfo['tmp_name'])){
        exit('文件不是通过HTTP POST上传！');
    }
    // 检测是否是真实的图片
    if($flag){
        if(!getimagesize($fileInfo['tmp_name'])){
            exit('不是真是的图片！');
        }
    }
    // 文件上传
    $path = $path.date('Ymd');
    if(!file_exists($path)){
        mkdir($path,0777,true);
        chmod($path,0777);
    }
    $name = md5(uniqid(microtime(true),true)).$ext;
    $newPath = $path.'/'.$name;
    if(!@move_uploaded_file($fileInfo['tmp_name'], $newPath)){
        exit('文件上传失败！');
    }
    return $newPath;
}

/*  构建上传文件数组
 * */
function getFiles($files){
    if(!$files){
        return false;
    }
    $i = 0;
    foreach($files as $file){
        if(is_string($file['name'])){
            $uploadFiles[$i] = $file;
            $i++;
        }elseif(is_array($file['name'])){
            foreach($file['name'] as $k=>$v){
                $uploadFiles[$i]['name'] = $file['name'][$k];
                $uploadFiles[$i]['type'] = $file['type'][$k];
                $uploadFiles[$i]['tmp_name'] = $file['tmp_name'][$k];
                $uploadFiles[$i]['error'] = $file['error'][$k];
                $uploadFiles[$i]['size'] = $file['size'][$k];
                $i++;
            }
        }
    }
    return $uploadFiles;
}

/*  单文件，多个单文件，单个多文件，多个多文件上传
 *  @param array $fileInfo 上传文件数据
 *  @param integer $maxSize 允许上传文件的大小
 *  @param array  $allowExt 允许上传文件类型数组
 * */
function uploadFiles($fileInfo, $maxSize=1111, $allowExt=array('jpg','png','gif')){
    if($fileInfo['error'] != UPLOAD_ERR_OK){
        switch($fileInfo['error']){
            case 1:
                exit('上传文件超过了upload_max_filesize选项的值'); break;
            case 2:
                exit('上传文件超过了max_file_size选项的值'); break;
            case 3:
                exit('上传文件仅有部分上传'); break;
            case 4:
                exit('没有选择要上传的文件'); break;
            case 6:
                exit('临时目录不存在'); break;
            case 7:
                exit('系统错误'); break;
            case 8:
                exit('系统错误'); break;
        }
    }
    //  检测上传文件大小
    if($fileInfo['size']>$maxSize){
        $res['msg'] = '上传文件过大！';
    }
    //  检测上传文件的类型
    $ext = $this->getExt($fileInfo['name']);
    if(!in_array($ext,$allowExt)){
        $res['msg'] = '上传文件类型不符合规范！';
    }
    //  检测是否是HTTP POST方式上传
    if(!is_uploaded_file()){

    }
}


}

/**导出表格
 * @param $filename 导出的csv文件名称 
 * @param array $tileArray 所有列名称
 * @param array $dataArray 所有列数据
 */
/*function exportToExcel($filename, $tileArray=[], $dataArray=[]){
    ini_set('memory_limit','512M');
    ini_set('max_execution_time',0);
    ob_end_clean();
    ob_start();
    header("Content-Type: text/csv");
    header("Content-Disposition:filename=".$filename);
    $fp=fopen('php://output','w');
    fwrite($fp, chr(0xEF).chr(0xBB).chr(0xBF));//转码 防止乱码(比如微信昵称(乱七八糟的))
    fputcsv($fp,$tileArray);
    $index = 0;
    foreach ($dataArray as $item) {
        if($index==1000){
            $index=0;
            ob_flush();
            flush();
        }
        $index++;
        fputcsv($fp,$item);
    }
    ob_flush();
    flush();
    ob_end_clean();
}*/



/**导出表格
 * @param $data 一个二维数组,结构如同从数据库查出来的数组           
 * @param $title excel的第一行标题,一个数组,如果为空则没有标题         
 * @param $filename 导出的xls文件名称
 */
/*function exportexcel($dataArray = array(), $titleArray = array(), $filename = 'report') {
    header ( "Content-type:application/octet-stream" );
    header ( "Accept-Ranges:bytes" );
    header ( "Content-type:application/vnd.ms-excel" );
    header ( "Content-Disposition:attachment;filename=" . $filename . ".xls" );
    header ( "Pragma: no-cache" );
    header ( "Expires: 0" );
    // 导出xls 开始
    if (! empty ( $title )) {
        foreach ( $title as $k => $v ) {
            $title [$k] = iconv ( "UTF-8", "GB2312", $v );
        }
        $title = implode ( "\t", $title );
        echo "$title\n";
    }
    if (! empty ( $data )) {
        foreach ( $data as $key => $val ) {
            foreach ( $val as $ck => $cv ) {
                $data [$key] [$ck] = iconv ( "UTF-8", "GB2312", $cv );
            }
            $data [$key] = implode ( "\t", $data [$key] );
        }
        echo implode ( "\n", $data );
    }
}

$ssssd = [1=>'正常 未兑换',2=>'正常 已兑换',3=>'正常 过期',4=>'正常商家已提现',5=>'作废'];
$count = $res->alias('l')->where($where)->count();// 查询满足要求的总记录数
$Page  = new \Think\Page($count,10000);// 实例化分页类 传入总记录数和每页显示的记录数(此处调用thinkphp 3.2的分页类)
$ppp   = ceil($count/10000);
$pp    = range(1,$ppp);
foreach ($pp as $kkk => $vvv) {
    $rs[$kkk] = $res->field('l.id lid,l.user_id,l.shop_id,l.code_num,l.code_src,l.winning_time,l.exchange_time,l.status,l.item_id iid,i.title,i.money,s.coder,u.nickname,u.head,s.manager,s.phone')->alias('l')->where($where)->join('sd_item i ON i.id=l.item_id')->join('left join  sd_shop s ON s.id=l.shop_id')->join('sd_user u ON u.id=l.user_id')->page($vvv.', 10000')->select();
    $str[$kkk] = "用户昵称,兑奖门店号,核销员,核销员手机号,中奖时间,兑换时间,奖项名称,中奖金额,中奖码,兑换状态";
    $exl11[$kkk] = explode(',',$str[$kkk]);
    foreach ($rs[$kkk] as $k => $v){
        if (!$v['nickname']) $v['nickname']           = '暂无数据';
        if (!$v['coder']) $v['coder']                 = '暂无数据';
        if (!$v['manager']) $v['manager']             = '暂无数据';
        if (!$v['phone']) $v['phone']                 = '暂无数据';
        if (!$v['winning_time']) $v['winning_time']   = '暂无数据';
        if (!$v['exchange_time']) $v['exchange_time'] = '暂无数据';
        if (!$v['title']) $v['title']                 = '暂无数据';
        if (!$v['money']) $v['money']                 = '暂无数据';
       
        $exl[$kkk][] = array(
            $v['nickname'],$v['coder'],$v['manager'],$v['phone'],$v['winning_time'],$v['exchange_time'],$v['title'],$v['money'],$ssssd[$v['status']]
        );
    }

    $this->exportToExcel('兑奖记录_'.date('Ymd').'.csv', $exl11[$kkk], $exl[$kkk]);//cvs
    $this->exportexcel($exl[$kkk], $exl11[$kkk], '兑奖记录_'.date('Ymd').'.xls');//xls
}*/



