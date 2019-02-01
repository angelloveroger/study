// 引入模块
const http = require('http');
const fs = require('fs');
/* http模块
 *  http.createServer() //创建服务器对象
 * 请求(req)相关方法
 *  req.url // 域名后面字符串
 * 响应(res)相关信息
 *  res.setHead(name(string), value(any)) //设置响应头单个参数
 *  res.writeHead(statusCode(number), statusMessage(string), headers(object))  //设置响应头信息
 *  res.write(chunk(string|buffer), encoding(string[DEFAULT:utf8]), callback(function), returns(boolean)) //设置响应信息
 *  res.end(chunk(string|buffer), encoding(string[DEFAULT:utf8]), callback(function), returns(boolean)) //设置响应信息
 */
const server = http.createServer(function (req, res) {
    /*fs.readFile('./index.html', function(err, data){
        res.writeHead(200, {'Content-Type':'text/html; CHARSET=UTF-8'});
    });*/

    /* URL模块
     *  Constructor: new URL(input[, base]) // url构造函数
     *  url.hash     //锚点
     *  url.host     //服务器地址
     *  url.hostname //域名
     *  url.href     //全链接
     *  url.origin   //协议+域名
     *  url.password //密码
     *  url.port     //服务器端口
     *  url.pathname //路径
     *  url.protocol //协议
     *  url.search   //查询字符串
     */
    const $url = new URL('http://127.0.0.1:3000/user/login?user=roger&pwd=123456ff#abc');
    res.write($url.hash + '\n'); // #abc
    res.write($url.host + '\n'); // 127.0.0.1:3000
    res.write($url.hostname + '\n'); // 127.0.0.1
    res.write($url.href + '\n');     // http://127.0.0.1:3000/user/login?user=roger&pwd=123456ff
    res.write($url.origin + '\n');   // http://127.0.0.1:3000
    res.write($url.password + '\n');
    res.write($url.port + '\n');     // 3000
    res.write($url.pathname + '\n'); // /user/login
    res.write($url.protocol + '\n'); // http:
    res.write($url.search + '\n');   // user=roger&pwd=123456ff

    res.end();
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