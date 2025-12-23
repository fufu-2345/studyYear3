const express = require('express'); 
const controllers = require('../Controllers/controllers.js');
const router = express.Router();

router.get('/getusers', controllers.getAllUsers); 

router.get('/getusers/:username', controllers.getOneUser);

router.get('/',(req,res)=> res.send("testttttt")); 

module.exports = router;