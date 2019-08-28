<?php
    include_once('./rogerClass.php');
    $obj = new rogerClass();

    //echo '<pre>';print_r($_FILES);exit;

    $file = $_FILES;
    $obj->getFiles($file);
    /*  文件上传需要配置form表单的提交方式为  method=‘post’
     *  还要配置 enctype='multipart/form-data'
     *
     *  文件上传变量数组
     *      上传文件名     [name] => abc.jpg
     *      上传文件类型     [type] => image/jpeg
     *      上传临时文件名     [tmp_name] => E:\xampp\tmp\php39.tmp
     *      上传错误信息     [error] => 0
     *      上传文件大小    [size] => 0
     *
     *  move_uploaded_file(临时文件，路径+文件名) 将服务器上的临时文件移动到指定目录下，返回bool值
     *  copy(临时文件，路径+文件名) 将服务器上的临时文件拷贝到指定目录下，返回bool值
     * */


    /*  php.ini关于文件上传到配置选项
     *  file_uploads = on       支持http上传
     *  upload_tmp_dir =        临时文件存储位置
     *  post_max_size = 8M      POST方式发送数据的最大值(默认8M)
     *  upload_max_filesize = 2M  允许上传文件的最大值(默认2M)
     *  max_file_uploads = 20   允许一次上传文件数的最大值(默认20)
     * */

