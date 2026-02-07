const mongoose = require('mongoose');


const connectDB = async () => {
    try {
        // เปลี่ยนชื่อ database ได้ตามต้องการ
        const conn = await mongoose.connect('mongodb://localhost:27017/nodedatabase'
        // , {
        //     useUnifiedTopology: true
        // }
    );
        console.log(`✅ MongoDB Connected: ${conn.connection.host}`);
    } catch (err) {
        console.error('❌ MongoDB Connection Error:', err.message);
        process.exit(1); // ปิด process หากเชื่อมไม่สำเร็จ
    }
};


module.exports = connectDB;
