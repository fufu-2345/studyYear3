const express = require('express');
const app = express();
const PORT = 3000;

function sendGreeting(req, res) {
    const name = req.query.name || 'Guest';
    const age = 20;
    res.send(`Hello, ${name}! and now Im ${age} years old now.`);
}

app.get('/', (req, res) => {
    res.send('Hello from Express!');
});

app.get('/greet', sendGreeting);

app.listen(PORT, () => {
    console.log(`Server is running at http://localhost:${PORT}`);
});