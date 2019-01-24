/*==================================================================================node服务器*/
/*// 引入http模块
var http = require('http');
// 创建服务器对象
server = http.createServer(function(req, res){
	// 发送HTTP头部 (HTTP状态值: 200:OK; 内容类型: text/html；字符编码：UTF-8)
	res.writeHead(200, {'Content-type':'text/html;CHARSET=UTF-8'});
	// 发送响应数据 "Hello Kitty"
	res.end('Hello Kitty\n');
});
// 调用服务器对象的listen方法
server.listen(8808);
// 终端打印如下信息
console.log('node server is running...');*/


/*==================================================================================模块示例
 ./node-server.js ./class.js ./teacher.js ./student.js
 */
//var classA = require('./class.js');
//classA.add('Angel', ['lilei', 'hanmeimei']);

/*加载fs模块读取文件信息
var readFile = require('fs');
var data = readFile.readFileSync('abc.txt');
console.log(data.toString());
*/

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
/*var http = require('http');
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
 });*/

