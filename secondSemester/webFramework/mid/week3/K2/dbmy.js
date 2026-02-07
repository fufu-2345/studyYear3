const mysql = require('mysql2');
const db = mysql.createConnection({
 host: 'localhost',      
 user: 'root', 
 password: '12345678',
 database: 'nodelab'
});

db.connect((err) => {
 if (err) {
   console.error('❌ MySQL connection error:', err.stack);
   return;
 }
 console.log('✅ Connected to MySQL as ID:', db.threadId);
});

module.exports = db;
