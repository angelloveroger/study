<?php

/**
 * Created by PhpStorm.
 * User: Roger
 * Date: 2019/8/28
 * Time: 0:29
 */
final class gd {

    // 画布资源
    public static $img;
    // 画布长度
    private static $width;
    // 画布宽度
    private static $height;
    // 字体大小
    private static $fontSize;
    // 验证码长度
    private static $len;
    // 实例
    private static $inst;

    private function __construct($len, $width, $height, $fontSize) {
        extension_loaded('gd') ? NULL : exit('GD NOT EXISTS!');
        self::$fontSize = $fontSize;
        self::$width = $width;
        self::$height = $height;
        self::$len = $len;

    }

    private function __clone() {

    }

    /**生成实例
     * @param int $len
     * @param int $width
     * @param int $height
     * @param int $fontSize
     * @return gd
     */
    public static function returnInst($len = 4, $width = 100, $height = 30, $fontSize = 10) {
        if (!self::$inst instanceof self) {
            self::$inst = new self($len, $width, $height, $fontSize);
        }
        return self::$inst;
    }

    /**创建默认【100*30】的画布
     * @param int $width 宽度
     * @param int $height 长度
     * @return resource
     */
    public static function createImg() {
        return self::$img = imagecreatetruecolor(self::$width, self::$height);
    }

    /**画布填充默认为【白色】的背景色
     * @param $img          画布资源
     * @param int $red 红色值
     * @param int $green 绿色值
     * @param int $blue 蓝色值
     * @return mixed
     */
    public static function setBgColor($img, $red = 255, $green = 255, $blue = 255) {
        $bgColor = imagecolorallocate($img, $red, $green, $blue);
        imagefill($img, 0, 0, $bgColor);
        return self::$img = $img;
    }

    /**生成默认【4位】随机字符串
     * @param int $len 长度
     * @param int $min 开始点
     * @param int $max 结束点
     * @return string
     */
    public static function randStr($len = 4, $min = 0, $max = 9) {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $min > strlen($str) - 1 ? $min = 0 : NULL;
        $max > strlen($str) - 1 ? $max = strlen($str) - 1 : NULL;
        if ($min >= $max) {
            $min = 0;
            $max = strlen($str) - 1;
        }
        $randStr = '';
        for ($i = 0; $i < $len; $i++) {
            $randStr .= $str[rand($min, $max)];
        }
        return $randStr;
    }

    /**生成默认【4位】验证码
     * @param $img          画布资源
     * @param int $maxColor 颜色最大值
     * @return mixed
     */
    public static function drawImg($img, $maxColor = 0) {
        for ($i = 0; $i < self::$len; $i++) {
            $fontContent = self::randStr(1);
            $red = rand(0, $maxColor);
            $green = rand(0, $maxColor);
            $blue = rand(0, $maxColor);
            $fontSize = self::$fontSize;
            $fontColor = imagecolorallocate($img, $red, $green, $blue);
            $x = ($i * self::$width / self::$len) + rand(0, self::$width / self::$len * 0.6);
            $y = rand(self::$height / 2 - 15, self::$height / 2 + 5);
            imagestring($img, $fontSize, $x, $y, $fontContent, $fontColor);
        }
        return self::$img = $img;
    }


}

header('Content-type: image/png');

$obj = gd::returnInst();
$obj::createImg();
$obj::setBgColor($obj::$img);
$obj::drawImg($obj::$img, 6);
imagepng($obj::$img);
