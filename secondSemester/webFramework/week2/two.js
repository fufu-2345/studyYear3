const express = require("express");
const app = express();
const PORT = 3000;

function passCallBack(req, res) {
  res.send("You passed the exam.");
}

function failCallBack(req, res) {
  res.send("Sorry! Please try again.");
}

function checkScore(score, req, res) {
  if (score >= 60) {
    passCallBack(req, res);
  } else {
    failCallBack(req, res);
  }
}

app.get("/check", (req, res) => {
  const score = Number(req.query.score);
  checkScore(score, req, res);
});

app.listen(PORT, () => {
  console.log(`Server is running at http://localhost:${PORT}`);
});
