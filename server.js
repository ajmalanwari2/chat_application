// const app = require('express')();
// const http = require('http').Server(app);
// const io = require('socket.io')(http);
//  http.listen(3000, function(){
//      console.log('listening to port 3000');
//  });
//
//  io.on('connection', function(socket){
//     socket.on("user_connected", function (user_id){
//        console.log("user_connected" + user_id);
//     });
//  });
const express = require('express')
const app = express();
const server = require('http').createServer(app);
const users = [];
const io = require('socket.io')(server, {
    cors: {origin: "*"}
});

server.listen(3000, () => {
    console.log('server is running and lesson on port 3000');
});

io.on('connection', function (socket) {
    socket.on("user_connected", function(user_id){
       users[user_id] = socket.id;
       io.emit('updateUserStatus', users);
       console.log("user connected"+user_id);
    });
    // console.log('connection');
    // socket.on('disconnect', (socket) => {
    //     console.log('Disconnected')
    // });
});
