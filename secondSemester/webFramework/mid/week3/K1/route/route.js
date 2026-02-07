const express = require('express');
const router = express.Router();
const controller = require('../controller/controllers.js');

router.get('/', controller.home);

router.get('/about', controller.about);

module.exports = router;