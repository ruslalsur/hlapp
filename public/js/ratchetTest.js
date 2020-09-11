var connection = new WebSocket('ws://localhost:8080');
connection.onopen = function(e) {
    console.log("Connection established!");
};

connection.onmessage = function(e) {
    console.log(e.data);
};

connection.send('сообщение из окна браузера');