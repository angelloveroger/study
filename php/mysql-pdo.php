<?php
function vd($data){
	echo '<pre>';
	var_dump($data);
}
$str = '<ul class="pagination"><li class="disabled"><span>&laquo;</span></li> <li class="active"><span>1</span></li><li><a href="/admin/Courses/index.html?spm=m-76-81&amp;page=2">2</a></li><li><a href="/admin/Courses/index.html?spm=m-76-81&amp;page=3">3</a></li><li><a href="/admin/Courses/index.html?spm=m-76-81&amp;page=4">4</a></li><li><a href="/admin/Courses/index.html?spm=m-76-81&amp;page=5">5</a></li><li><a href="/admin/Courses/index.html?spm=m-76-81&amp;page=6">6</a></li><li><a href="/admin/Courses/index.html?spm=m-76-81&amp;page=7">7</a></li><li><a href="/admin/Courses/index.html?spm=m-76-81&amp;page=8">8</a></li> <li><a href="/admin/Courses/index.html?spm=m-76-81&amp;page=2">&raquo;</a></li></ul>';
$string = preg_replace(['|href="(.*?)"|', '|pagination|'], ['data-open="$1" href="javascript:void(0);"', 'pagination pull-right'], $str);
echo $string;


exit;	


//$dsn = 'mysql:host=localhost;dbname=test';	//参数形式链接数据库
//$dsn = 'uri:file://D:\study\php\study\dsn.txt';	//uri形式连接数据库
$dsn = 'test';	//配置文件形式连接数据库(在php.ini中添加   pdo.dsn.test='host=localhost;dbname=test')
$user = 'root';
$password = '';
try{
	$pdo = new PDO($dsn, $user, $password);
	/*======================insert==========================
	$sql = 'INSERT test(test_char, test_varchar) values("123456789", "123456789")';
	$res = $pdo->exec($sql);vd($res);//返回受影响的行数
	$lastId = $pdo->lastInsertId();vd($lastId);//返回最后插入数据的ID*/
	
	/*================命名参数占位符===================
	$sql = 'select * from test where id=:id and test_char=:test_char';
	$stmt = $pdo->prepare($sql);//发送预处理sql，返回PDOStatement对象
	$res = $stmt->execute([':id'=>5, 'test_char'=>123456789]);//执行sql，返回bool
	$arr = $stmt->fetch(PDO::FETCH_ASSOC);//将查询结果集转换为数组 FETCH_ASSOC:关联数组  FETCH_BOTH:全部  FETCH_OBJ:对象
	*/
	/*===================?占位符=======================
	$sql = 'select * from test where test_char=? and test_varchar=?';
	$stmt = $pdo->prepare($sql);//发送预处理sql，返回PDOStatement对象
	$res = $stmt-> execute([123456789,123456789]);//执行sql，返回bool
	$rowCount = $stmt->rowCount();//查询结果条数
	$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);//查询结果数组
	*/
	/*==============bindParam() 参数只能为变量，不能是直接的值=========================
	$sql = 'select * from test where test_char=? and test_varchar=?';
	$stmt = $pdo->prepare($sql);
	$stmt -> bindParam(1, $test_char, PDO::PARAM_INT);
	$stmt -> bindParam(2, $test_varchar, PDO::PARAM_INT);
	$test_char = 123456789;
	$test_varchar = 123456789;
	$stmt->execute();
	$arr = $stmt->fetchAll();
	*/
	/*==============bindParam()=========================
	$sql = 'select * from test where test_char=:test_char and test_varchar=:test_varchar';
	$stmt = $pdo -> prepare($sql);
	$stmt -> bindValue(':test_char', 123456789);
	$stmt -> bindValue(':test_varchar', 123456789);
	$res = $stmt -> execute();
	$arr = $stmt -> fetchAll();
	*/
	vd($arr);
}catch(PDOException $e){
	echo $e->getMessage();
}


exit;
//--------------------------------------------------------------------------------------------------------------------

/*include_once 'pdo.php';
DPDO::instance('localhost:3306', 'root', '');*/


























