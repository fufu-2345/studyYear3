const http = require('http');

const data = [{id:1,name:"jack"},{id:2,name:"john"}]

const server = http.createServer((req, res) => {
    if (req.url === '/'){
        res.writeHead(200,{'Content-Type':'text/plain;charset=utf-8'});
        res.statusCode = 200;
        res.write('ระบบพร้อมทำงาน');
    }
    else if(req.url === '/nothingfound'){
        res.writeHead(400,{'Content-Type':'text/plain;charset=utf-8'});
        res.statusCode = 400;
        res.write('ไม่พบ Page นี้');
    }
    else if(req.url === '/accessserver'){
        res.writeHead(500,{'Content-Type':'text/plain;charset=utf-8'});
        res.statusCode = 500;
        res.write('Server มีข้อผิดพลาด');
    }  
    res.end();
}).listen(3000, () => {
  console.log('เซิร์ฟเวอร์ทำงานที่ http://localhost:3000');
});


// const server = http.createServer((req, res) => {
//   res.writeHead(200, { 'Content-Type': 'text/plain' });
//   res.end('Welcome to Node.js First Lab!\n');
// });

// server.listen(3000, () => {
//   console.log('Server is running at http://localhost:3000');
// });