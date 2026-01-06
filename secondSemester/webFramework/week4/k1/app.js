const express = require("express");
const session = require("express-session");
const bodyParser = require("body-parser");

const app = express();

const users = [
  { id: 1, username: "admin", password: "admin123", role: "admin" },
  { id: 2, username: "john", password: "john123", role: "user" },
];

app.use(bodyParser.json());

app.use(
  session({
    secret: "your-secret-key",
    resave: false,
    saveUninitialized: false,
  })
);

app.get("/dashboard", (req, res) => {
  if (req.session.user) {
    res.send(`Welcome ${req.session.user.username}`);
  } else {
    res.status(401).send("Please log in.");
  }
});

app.post("/login", (req, res) => {
  const { username, password } = req.body;
  const userr = users.find(
    (u) => u.username === username && u.password === password
  );
  if (userr) {
    req.session.user = userr; // 👈 This creates the session
    res.redirect("/home");
  } else {
    res.status(401).send("Invalid credentials.");
  }
});

app.get("/home", (req, res) => {
  if (req.session.user) {
    res.send(`Welcome ${req.session.user.username}`);
  } else {
    res.status(401).send("Please log in.");
  }
});

app.get("/home", (req, res) => {
  if (req.session.user) {
    res.send(`Welcome ${req.session.user.username}`);
  } else {
    res.status(401).send("Please log in.");
  }
});

app.get("/logout", (req, res) => {
  req.session.destroy();
  res.send("You have been logged out.");
});

app.listen(3000, () => {
  console.log("Listening on http://localhost:3000");
});
