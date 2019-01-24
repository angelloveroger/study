/*==================================================================================node服务器
 */
	// var http = require('http');
	// var server = http.createServer(function(req, res){
	// 	res.writeHead(200, {'Content-Type':'text/plain; charset=utf-8'});
	// 	res.end('node服务器搭建完成\n');
	// });
	// server.listen(1234, '127.0.0.1');
	// console.log('node服务器正在运行');


/*==================================================================================模块示例
	./index.js ./class.js ./teacher.js ./student.js 
 */
	// var classA = require('./class.js');
	// classA.add('Angel', ['lilei', 'hanmeimei']);

/*==================================================================================API接口
 url模块
 url.parse(url)   格式化url
 url.format(param) 组装url
 url.resolve(url, pathname) 组装url

 querystring模块
 querystring.stringify() 字符串序列化
 querystring.parse()  字符串反序列化
 querystring.escape()  转义
 querysting.unescape()  反转义
 */

/*==================================================================================小爬虫*/
var http = require('http');
var url = 'http://local.any/admin/login.html';
var htmlData = http.get(url, function(res){
	var html = '';
	res.on('data', function(data){
		html += data
	});
	res.on('end', function(){
		console.log(html);
	});
});
htmlData.on('error', function(){
	console.log('获取数据失败');
});

 
 /*==================================================================================npm使用
npm -v 					查看npm版本
npm install npm -g  	升级npm
npm install moduleName	安装模块
 */