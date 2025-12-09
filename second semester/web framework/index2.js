const express = require('express');
const app = express();
const port = 3000;

app.use(express.json());

app.get('/', (req, res) => {
    res.set('Content-Type', 'text/html');
    res.send('<link rel="stylesheet" href="css/global.css"> <h1>Hello, world!</h1> <br/> <img src="pic/cat.jpg" width="646" height="432">'); 
});

app.post('/message', (req, res) => {
  try {
    const data = req.body;
    res.status(200).json({ message: data });
  } catch (err) {
    res.status(500).json({ error: 'ไม่สามารถดำเนินการได้', details: err.message });
  }
});

app.listen(port, () => {
    console.log(`Server เปิดที่ http://localhost:${port}`);
});
