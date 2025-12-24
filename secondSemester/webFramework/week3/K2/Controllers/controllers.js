const User = require('../models/user.js');

// Get all users
const getAllUsers = (req, res) => {
    User.getAllUsers((err, results) => {
    if (err) {
        console.error('❌ Error in getAllUsers:', err);
        return res.status(500).json({ error: 'Internal Server Error' });
    }   
        res.json(results);
    });
};

const getOneUser = (req, res) => {
    const username = req.params.username;
    User.getOneUser(username,(err, results) => {
    if (err) {
        console.error('❌ Error in getOneUser:', err);
        return res.status(500).json({ error: 'Internal Server Error' });
    }   
        res.json(results);
    });
};

module.exports = {getAllUsers,getOneUser};
