<?php

/**
 * 微信协议 不要问我这是什么 我都不知道这是什么
 *
 */
require_once('./rogerClass.php');

class wechatProtocol{

    private static $instance;
    private static $domain;
    private static $uri;
    public static $classRoger;

    private function __construct($domain='127.0.0.1') {
        self::$domain = $domain;
        self::$classRoger = new rogerClass();
    }
    public static function getInstance($domain){
        if(!(self::$instance instanceof self)){
            self::$instance = new self($domain);
        }
        return self::$instance;
    }
    private function __clone(){}
    private static function setUri($uri){
        if(!$uri || !is_string(trim($uri))) return false;
        self::$uri = $uri;
    }
    public static function getQrCode($api='/api/Login/GetQrCode', $proxyIp='139.186.69.124', $proxyUserName='albert', $proxyPassword='venus'){
        self::setUri($api);
        $data = [
            'proxyIp' => $proxyIp,
            'proxyUserName' => $proxyUserName,
            'proxyPassword' => $proxyPassword
        ];
        return self::$classRoger->curlPost(self::$domain.self::$uri, $data, 2);
    }
}

$obj = wechatProtocol::getInstance('http://139.186.69.124:8088');
echo '<pre>';
print_r($obj->getQrCode());

