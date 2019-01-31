// 引入http模块,fs模块
const http = require('http');
const fs = require('fs');
// 创建服务器对象
const server = http.createServer(function (req, res) {
    // fs调用readFile方法读取文件，非堵塞模式
    fs.readFile('./index.html', function(err, data){
        // 设置响应头信息
        res.writeHead(200, {'Content-Type':'text/html; CHARSET=UTF-8'});
        // 设置响应正文
        res.end(data);
    });
});
// 监听3000端口
server.listen(3000);

console.log('nodeServer starting...');

/*==================================================================================模块示例
 ./node-server.js ./class.js ./teacher.js ./student.js
 */
//var classA = require('./class.js');
//classA.add('Angel', ['lilei', 'hanmeimei']);


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