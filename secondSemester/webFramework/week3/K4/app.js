const express = require('express');
const connectDB = require('./dbmon.js'); // เรียกใช้ฟังก์ชันเชื่อมต่อ
const app = express();
const ebookRoutes = require('./Routes/ebookRoute.js');

connectDB();

app.use(express.json());

app.use('/', ebookRoutes);

app.listen(3000, () => {
    console.log('🚀 Server is running on http://127.0.0.1:3000');
});