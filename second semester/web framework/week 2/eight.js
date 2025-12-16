const express = require('express');
const app = express();
const path = require('path');

app.set('views', path.join("index.ejs", 'views'));
app.set('view engine', 'ejs'); // Set EJS as view engine

app.get('/', (req, res) => {
    const myName = 'Sweet Teacher';
    const myWebsite = 'Node.js Learning Hub';
    // Send variables to EJS
    res.render('index', { name: myName, website: myWebsite });
});

function getDayName() {
    const days = [
        'red', //Sunday
        'yellow', 
        'pink', 
        'green', 
        'orange', 
        'blue', 
        'magenta'
        ];
    
    const today = new Date();
    const dayIndex = today.getDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday
    return days[dayIndex];
} 

app.get('/getday', (req, res) => {
    getDayName();
});

app.listen(3000, () => {
    console.log(getDayName());
    console.log('Server is running at http://localhost:3000');
});
