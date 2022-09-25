const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http);
 http.listen(3000, function(){
     console.log('listening to port 3000');
 })
// const express = require('express')
// const app = express();
// const server = require('http').createServer(app);
// const io = require('socket.io')(server, {
//     cors: {origin: "*"}
// });
// io.on('connection', (socket) => {
//     console.log('connection');
//     socket.on('disconnect', (socket)=>{
//        console.log('Disconnected')
//     });
// });
// server.listen(3000, () =>{
//    console.log('server is running and lesson on port 3000');
// });
