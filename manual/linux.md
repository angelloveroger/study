> # LINUX
> ---
> **1.linux下，php安装fileinfo扩展`（不安装这个扩展，会导致无法上传图片）`**    
>> **A.检查系统是否安装了这个扩展**   
>> 
>>     php -i | grep fileinfo
>> **B.如果没有安装这个扩展，进行如下操作：`（[1]和[2]只需要执行一个即可）`**  
>>> *[1]如果本地没有php安装包*
>>>  
>>>     cd home   
>>>     wget http://cn2.php.net/distributions/php-5.6.36.tar.xz   
>>>     xz -d php-5.6.36.tar.xz  
>>>     tar xvf php-5.6.36.tar  
>>>     cd php-5.6.36/ext/fileinfo  
>>>  *[2]如果本地有php安装包，找到并进入该路径*
>>> 
>>>     find / -name fileinfo
>>>     cd 你的php路径/ext/fileinfo
>>> **在当前目录下执行以下操作：**     
>>>
>>>     /usr/local/php/bin/phpize   
>>>     ./configure --with-php-config=/usr/local/php/bin/php-config
>>>     make  
>>>     make install
>>
>> **C、修改php.ini**  
>>>     vim /usr/local/php/etc/php.ini
>>> **最后面增加** 
>>>     
>>>     extension=“fileinfo.so”
>>
>> **D.重启服务**
>>>     systemctl restart php-fpm
>>>     systemctl restart nginx  
>>> ---