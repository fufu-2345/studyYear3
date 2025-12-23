const express = require('express');
const app = express();
const path = require('path');

// app.set('view engine', 'ejs');
// app.set('views', path.join(__dirname, 'views'));

const indexRoutes = require('./routes/route.js');

app.use('/', indexRoutes);

app.listen(3000, () => {
  console.log('Server is running on 127.0.0.1:3000');
});
