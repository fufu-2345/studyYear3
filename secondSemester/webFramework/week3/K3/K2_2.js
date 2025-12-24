const express = require('express');
const connectDB = require('./dbmon'); // เรียกใช้ฟังก์ชันเชื่อมต่อ
const app = express();
const routes = require('./routes/routek2_2.js');

connectDB(); // เชื่อมต่อ MongoDB


app.use(express.json());

// Routes ต่าง ๆ จะอยู่ตรงนี้
// ...

app.use('/', routes);


app.listen(3000, () => {
    console.log('🚀 Server is running on http://127.0.0.1:3000');
});