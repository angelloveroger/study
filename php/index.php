<?php

var_dump(25/7 );
var_dump((int)(25/7) );
var_dump(round(25/7) );
//$preg = '/(i?)<img.*? src=\"?(.*?\\.(jpg|gif|bmp|bnp|png))\".*? />/';

exit;
$str = '<img src="http://local.any/upload/c14270a0b6a3ebc5/e66731577f87c81a.jpg style="width:100%; height: auto" />dfeadfd';
//echo strpos($str, 'style="width:100%; height: auto" />');exit;
//echo substr($str, strpos($str, 'style="width:100%; height: auto" />')+35);

echo base64_decode('YzEwZTI4N2YyYjFlN2Y1NDdiMjBhOWViY2UyYWFkYTI2YWIyMGVmMg==');exit;
$str = base64_encode('c10e287f2b1e7f547b20a9ebce2aada26ab20ef2');
echo $str;

exit;
	phpinfo();
/*变量的传值与引用  
	不用'&'相当于变量拷贝：'='左边会生成一个与'='右边一模一样的变量，当把左边的变量赋值为0，或者NULL，右边的变量还是之前的值，不会随着变0，或者NULL；
	用'&'相当于引用：'='左边会指向与'='右边一样的存储值，而不是指向'='右边的变量，当把左边的变量赋值为0，或者NULL，右边的变量也会随着变0，或者NULL；*/
$a = 5;
$b = &$a;
echo $a.'<br/>';echo $b.'<hr/>';
$a = 0;
echo $a.'<br/>';echo $b;exit;






