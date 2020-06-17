<?php

/**微信协议
 * url 统一资源定位符
 * uri 统一资源标识符
 * URL是URI的一个子集
 */
require_once('./rogerClass.php');

class wechatProtocol{

    private static $instance;
    private static $domain;
    private static $url;
    public static $classRoger;

    /**私有化的构造函数，防止外部直接实例化
     * wechatProtocol constructor.
     * @param string $domain 域名
     */
    private function __construct($domain='127.0.0.1') {
        if(!$domain || !is_string(trim($domain))) return false;
        self::$domain = $domain;
        self::$classRoger = new rogerClass();
    }

    /**私有化的克隆方法，防止克隆该类
     */
    private function __clone(){}

    /**用于外部实例化该类，获取类的实例
     * @param string $domain 域名
     * @return wechatProtocol
     */
    public static function getInstance($domain){
        if(!(self::$instance instanceof self)){
            self::$instance = new self($domain);
        }
        return self::$instance;
    }

    /**生成完整的api接口url
     * @param string $api api接口资源定位符
     * @param array $query 请求字符串
     * @return bool
     */
    private static function setUrl($api='', $query=[]){
        if(!is_string(trim($api))) return false;
        if(!is_array($query)) return false;
        if(count($query)) self::checkStr($query);
        self::checkStr($api);
        self::$url = self::$domain . $api;
        if(count($query)){
            foreach($query as $val){
                self::$url = self::$url . '/' . $val;
            }
        }
    }

    /**检测字符串
     * @param array $data  需要加测的数据
     * @return bool
     */
    private static function checkStr($data=[]){
        if(is_string($data)){
            if(strlen(trim($data))==0) return false;
        }
        if(is_array($data)){
            foreach($data as $val){
                if(is_string($val)){
                    if(strlen(trim($val))==0) return false;
                }
            }
        }
        return true;
    }

    /**发送接口请求
     * @param string $api api接口资源定位符
     * @param array $data 请求数据
     * @param array $query query字符串 g4_-jsFX-YOjsApyjlsF
     * @return mixed
     */
    public static function wechatQuery($api='', $data=[], $query=[]){
        self::checkStr($api);
        if(count($data)) self::checkStr($data);
        if(count($query)) self::checkStr($query);
        self::setUrl($api, $query);
        return self::$classRoger->curlPost(self::$url, $data);
    }


}

$obj = wechatProtocol::getInstance('http://139.186.69.124:8088');
//获取登录二维码，扫码登录获取uuid
$GetQrCode = $obj->wechatQuery('/api/Login/GetQrCode', ['uuid'=>'g4_-jsFX-YOjsApyjlsF']);
$obj::$classRoger->customLog('GetQrCode.log', $GetQrCode['Data']['Uuid']);
echo '<img src="'.$GetQrCode['Data']['QrBase64'].'" >';

//根据uuid获取wxId
/*$checkLogin = $obj->wechatQuery('/api/Login/CheckLogin', ['uuid'=>'A4bbVx1Qd8wyhjyxVV4z'], ['A4bbVx1Qd8wyhjyxVV4z']);
$obj::$classRoger->pt($checkLogin);*/

//根据wxId二次登录
/*$twiceLogin = $obj->wechatQuery('/api/Login/TwiceLogin', ['wxId'=>'wxid_mymhoxopirbj22'], ['wxid_mymhoxopirbj22']);
$obj::$classRoger->pt($twiceLogin);*/

//获取朋友圈列表 POST /api/FriendCircle/GetFriendCircleList
/*$friendCircleList = $obj->wechatQuery('/api/FriendCircle/GetFriendCircleList', ['fristPageMd5'=>'e4da3b7fbbce2345d7772b0674a318d5', 'id'=>'0', 'WxId'=>'wxid_mymhoxopirbj22']);
$obj::$classRoger->customLog('GetFriendCircleList.log', $friendCircleList);*/

//发送朋友圈 POST /api/FriendCircle/SendFriendCircle
// $data = [
//     'type'          => 0,
//     'blackList'     => [
//         ''
//     ],
//     'withUserList'  => [
//         ''
//     ],
//     'mediaInfos'    => [
//         'url'       => '',
//         'imageUrl'  => 'https://www.jzbshebao.cn/Uploads/Public/Uploads/content/80-1.jpg',
//         'width'     => 400,
//         'height'    => 266,
//         'totalSize' => 24417
//     ],
//     'title'         => 'tupian',
//     'contentUrl'    => '',
//     'description'   => '',
//     'content'       => '年少的我们都是热烈而坚持的，那是一种光芒，引人入胜，我羡慕那些时光流逝却未能改变他们的人',
//     'wxId'          => 'wxid_mymhoxopirbj22'
// ];
// $sendFriendCircle = $obj->wechatQuery('/api/FriendCircle/SendFriendCircle', $data);
// $obj::$classRoger->pt($sendFriendCircle);

