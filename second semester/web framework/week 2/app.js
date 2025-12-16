const express = require('express');
const app = express();
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

const indexRoutes= require('./routes/index');
const submitRoutes = require('./routes/submit')

app.use("/", indexRoutes);
app.use("/submit", submitRoutes);

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});