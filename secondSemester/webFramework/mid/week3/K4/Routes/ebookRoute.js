const express = require('express'); 
const controllers = require('../Controllers/ebookController');
const router = express.Router();

router.get('/',(req,res)=> res.send("testttttt")); 
router.get('/getAllEbook', controllers.getAllEbook); 
router.get('/getNoAuth', controllers.getNoAuth);
router.put('/updateData/:ebookid/:username', controllers.updateData);
router.post('/updateData/:ebookid/:username', controllers.updateData);
router.post('/addEBook', controllers.addEBook);

module.exports = router;
