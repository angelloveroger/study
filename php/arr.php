<?php

/*array_shift(array)  函数删除数组中第一个元素，并返回被删除的元素，原数组改变(引用传递)；

array_unshift(array,value1,[value2,value3...])  函数用于向数组头部插入元素，返回新数组的长度，原数组改变(引用传递)。

array_column(array,column_key,[index_key])  返回数组中某个单一列的值,index_key可以用作返回数组的键名

array_combine(keys,values)  函数通过合并两个数组来创建一个新数组，其中的一个数组是键名，另一个数组的值为键值，返回新合成的数组

array_column(array,column_key,[index_key]) 返回输入数组中某个单一列的值

array_sum(array) 函数返回数组中所有值的和

array_merge(array1,[array2,array3...])  函数把一个或多个数组合并为一个数组，返回新合成的数组

array_fill(index,number,value)	函数用给定的值填充数组，返回的数组有 number 个元素，值为 value


krsort(&array,[sortingtype]) 按键名降序排列数组,返回bool 		 原数组会发生改变（即引用传递）
	[sortingtype]规定如何比较数组

ksort(&array,[sortingtype]) 按键名升序排列数组,返回bool 		 原数组会发生改变（即引用传递）
	[sortingtype]规定如何比较数组
		
sort(&array,[sortingtype]) 数组升序排序，返回bool  		 原数组会发生改变（即引用传递）
	[sortingtype]规定如何比较数组

rsort(array,[sortingtype]) 数组降序排序，返回bool   	 原数组会发生改变（即引用传递）
	[sortingtype]规定如何比较数组

in_array(serch,array,[bool]) 检查数组中是否存在指定元素,返回为bool 
	[bool] 严格模式

array_map($func,array,array...) 将函数作用于数组的每个元素，返回新的数组

array_walk(&array,$func,[userdata]) 将函数作用于数组的每个元素，返回bool      原数组会发生改变（即引用传递）
	[userdata]用户自定义函数参数

array_filer(array,$func) 自定义函数过滤数组，返回新的数组	

array_chunk(array,size,[preserve_key]) 把数组分为n个新的数组块，返回为新的二维数组
	[preserve_key]是否保留键名

array_push(&array,element,element2...)	把元素放入数组末尾，返回新的数组的长度		原数组会发生改变（即引用传递）	

array_unshift(array,element,element2...) 把指定的元素放入数组头部,返回新的数组的长度 		原数组会发生改变（即引用传递）

array_pop(&array) 删除数组中最后一个元素,并返回删除的元素 		原数组会发生改变（即引用传递） 

array_shift(array) 删除数组中第一个元素，并返回删除的元素 		原数组会发生改变（即引用传递）

array_pad(array,length,value) 用给定的值将数组填充到指定长度,返回填充后的新数组 
	length为正，往数组结尾添加，为负，往数组头添加

array_unique(array，[sortingtype]) 移除数组中重复的元素，返回新的数组
	[sortingtype]规定如何比较数组

array_combine(array1,array2) 合并数组,前面数组元素充当键，后面数组元素充当值,返回新的数组

array_merge(array1,array2,array3.....) 合并数组，返回新的数组	

array_slice(array,offset,[length],[bool]) 从数组中截取一段，即分割数组
	[length]规定截取长度,如果不加，即从偏移出到末尾
	[bool]是否保留原来的键名

array_splice(array,offset,[length],[Element]) 从数组截取元素，并用指定的元素填充进去, 返回由删除元素组成的数组      原数组会发生改变（即引用传递）
	[length]截取长度
	[element]替换元素

range(min,max,[step])生成数组	
	[step]步进设定，默认为1

array_sum(array) 数组求和

array_diff(array1,array2) 比较数组，返回差集,只比较键值

array_diff_assoc(array1,array2) 比较数组，返回差集,比较键名和键值

array_diff_key(array1,array2) 比较数组，返回差集，只比较键名	

array_intersect(array1,array2) 比较数组，返回交集，只比较键值 

array_intersect_key(array1,array2) 比较数组，返回交集，只比较键名

array_intersect_assoc(array1,array2) 比较数组，返回交集,比较键名和键值

array_flip(array) 交换数组中的键和值 ,返回反转后的新数组

array_rand(array,[number]) 随机返回数组中的一个或多个键
	[number]规定返回的键的个数，默认是1

array_fill(index,number,value) 用给定键值填充数组，返回填充后的数组

array_fill_keys(array,value) 用给定的指定键名的键值填充数组，返回新的数组
	array 作为新数组的健
	value 作为新数组的值

*/

exit;
echo count(strlen('http://www.baidu.com'));//输出1
exit;

$data = array(
	'user_id'=>800,
	'name'=>'姬昌',
	'idcard'=>'415555555555555888',
	'bankname'=>'中信银行',
	'cardname'=>'姬昌',
	'cardnum'=>8888888888888888,
	'reserved_phone'=>18617115555
	);
echo json_encode($data);

exit;

function str($n){
	$num = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','a','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	/*
	for($i=0; $i<=$n; $i++){echo $i;
		//$str += $num[0, count($num)];
		
	}*/
	//echo $str;
	$str = '';
	for($i=1; $i<=$n; $i++){
		$str .= $num[mt_rand(0, count($num)-1)];
	}
	return $str;	
}

echo str(5);

exit;
$a = array(
	array(1,2,3),
	array('a','b','c'),
	array('1','2','3')
	);

$b = array(
	array('aa','ab','ac'),	
	array(13,24,35),
	array('12','23')
	);


/*$a = array(1,2,3);
$b = array('a','b');*/
/*$c = array();
foreach($a as $k=>$v){
	$c[] = array_merge($v,$b[$k]);
}*/

/*foreach($b as $v){

}*/

$c = array_merge($a,$b);

print_r($c);exit;


  $a = array(
    'ab' ,
    'cd' ,
    'ef' ,
    'gh'
  );

unset($a[0]);

print_r($a);
$sort = array_column($list, 'status');print_r($sort);exit;
                array_multisort($list, SORT_ASC);$sort = array_column($list, 'status');print_r($sort);exit;




