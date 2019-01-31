// 引入http模块
const http = require('http');

const fs = require('fs');


const server = http.createServer(function (req, res) {
    fs.readFile('./index.html', function(err, data){
        res.writeHead(200, {'Content-Type':'text/html; CHARSET=UTF-8'});
        res.end(data);
    });
});

server.listen(3000);

console.log('starting...');