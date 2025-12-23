const express = require('express');
const path = require('path');
const app = express();
app.use(express.static('public'));

app.get('/', (req, res) => {
 res.sendFile('index.html');   
  //If no static path is set
 //res.sendFile(path.join(__dirname, '/public/index.html'));
});
app.listen(3000, () => {
 console.log('Server running on http://localhost:3000');
});
