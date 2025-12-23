const db = require('../dbmy.js'); 

const User = {
 getAllUsers: (callback) => {
   const query = 'SELECT * FROM users';
   db.query(query, (err, results) => {
     callback(err, results);
   });
 },

    getOneUser: (username, callback) => {
    const query = `SELECT * FROM users WHERE username = ?`;
    db.query(query, [username], (err, results) => {
        callback(err, results);
    });
    }
}

module.exports = User;
