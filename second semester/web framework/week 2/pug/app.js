const express = require('express');
const path = require('path');
const app = express();


// Set Pug as the view engine
app.set('view engine', 'pug');
app.set('../views', path.join(__dirname, '../views'));
// Route that renders the page
app.get('/', (req, res) => {
  res.render('myfruit', { title: 'My Pug App', message: 'Hello from Pug!', Titlequestion: "test test test", Mostfavorite:"test1", Secondfavorite:"test2", Thirdfavorite:"test3" });
});


app.listen(3000, () => {
  console.log(`Server running at http://localhost:3000`);
});
