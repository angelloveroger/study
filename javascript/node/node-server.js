var http = require('http');
server = http.createServer(function(req, res){
	res.writeHead(200, {'Content-type':'text/html;CHARSET=UTF-8'});
	res.end('Hello Kitty\n');
});
server.listen(8808);

console.log('node server is running...');



/*var http = require('http');

http.createServer(function (request, response) {

    // 发送 HTTP 头部 
    // HTTP 状态值: 200 : OK
    // 内容类型: text/plain
    response.writeHead(200, {'Content-Type': 'text/plain'});

    // 发送响应数据 "Hello World"
    response.end('Hello World\n');
}).listen(8888);

// 终端打印如下信息
console.log('Server running at http://127.0.0.1:8888/');*/