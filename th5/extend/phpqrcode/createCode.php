<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/8/29
 * Time: 16:54
 */
final class createCode {

    private static $inst;
    private static $data;
    private static $imgUrl;
    private static $level;
    private static $size;
    private static $margin;

    private function __clone() {

    }

    /**实例化类
     * createCode constructor.
     * @param string $level 生成的二维码容错率 【可选参数 L M Q H】
     * @param int $size 生成的二维码尺寸    【可选参数 1-10】
     * @param int $margin 生成的二维码空白区域大小
     */
    private function __construct($level = 'L', $size = 4, $margin = 2) {
        self::$level = $level;
        self::$size = $size;
        self::$margin = $margin;
    }

    /**外部初始化实例的入口
     * @return createCode
     */
    public static function returnInst() {
        if( !self::$inst instanceof self ) {
            self::$inst = new self;
        }
        return self::$inst;
    }

    /**二维码的数据
     * @param $data
     */
    public static function setData($data) {
        self::$data = $data;
    }

    /**二维码存放路径
     * @param $imgUrl
     */
    public static function setImgUrl($imgUrl) {
        self::$imgUrl = $imgUrl;
    }

    /**二维码容错率
     * @param $level
     */
    public static function setLevel($level) {
        self::$level = $level;
    }

    /**二维码大小
     * @param $size
     */
    public function setSize($size) {
        self::$size = $size;
    }

    /**二维码空白区域
     * @param $margin
     */
    public function setMargin($margin) {
        self::$margin = $margin;
    }

    /**生成二维码
     *
     */
    public function createQRcode() {
        $this->includeSth();
        $obj = new QRcode();
        $obj->png( self::$data, self::$imgUrl, self::$level, self::$size, self::$margin );
    }

    /**
     *
     */
    private function includeSth() {
        include_once( EXTEND_PATH . 'phpqrcode/qrconst.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrconfig.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrtools.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrspec.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrimage.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrinput.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrbitstream.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrsplit.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrrscode.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrmask.php' );
        include_once( EXTEND_PATH . 'phpqrcode/qrencode.php' );
    }

}