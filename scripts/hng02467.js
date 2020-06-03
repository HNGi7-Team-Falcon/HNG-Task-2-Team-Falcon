const http = require('http');

const host = 'localhost';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Hello World, this is bankole ahmed with HNGi7 ID HNG-02467 using Nodejs');
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${host}:${port}/`);
});
