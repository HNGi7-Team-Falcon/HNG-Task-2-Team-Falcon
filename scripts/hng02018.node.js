const http = require('http');
const fullname = 'Seye Olofinyo';
const ID = 'HNG-02018';
const language = 'NodeJS';

const server = http.createServer((req, res) => {

    res.status(200).json(`Hello World, this is ${fullname} with HNGi7 ID ${ID} using ${language} for stage 2 task`)
});

server.listen(8080);