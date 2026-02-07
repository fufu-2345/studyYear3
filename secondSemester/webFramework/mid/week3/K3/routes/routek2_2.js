const express = require('express'); 
const controllers = require('../controllers/controllerk2_2.js');
const router = express.Router();

router.post('/createUser', controllers.createUser); 

router.get('/getAllUsers', controllers.getAllUsers);

router.get('/getUserById/:id', controllers.getUserById);

router.put('/updateUser/:id', controllers.updateUser);

router.delete('/deleteUser/:id', controllers.deleteUser);

router.get('/',(req,res)=> res.send("testttttt")); 

module.exports = router;