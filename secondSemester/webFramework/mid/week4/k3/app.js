const express = require("express");
const axios = require("axios");
const jwt = require("jsonwebtoken");
const session = require("express-session");
const bodyParser = require("body-parser");
const { authenticateJWTToken } = require("./middleware/jwtauthen.js");

const app = express();

const user = [
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
  const { username1, password1 } = req.body;
  if (username1 === user.username && password1 === user.password) {
    const token = jwt.sign({ id: user.id }, "SECRET_KEY", { expiresIn: "1h" });
    res.json({ token });
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

app.get("/protected", (req, res) => {
  res.json({ message: "Protected content", user: req.user });
});

app.get("/access", authenticateJWTToken, (req, res) => {
  axios
    .get("http://localhost:3000/protected", {
      headers: {
        Authorization: `Bearer ${req.token}`,
      },
    })
    .then((response) => {
      res.send(response.data);
    })
    .catch((error) => {
      console.error("Error", error.response?.data || error.message);
    });
});

app.get("/logout", (req, res) => {
  req.session.destroy();
  res.send("You have been logged out.");
});

app.listen(3000, () => {
  console.log("Listening on http://localhost:3000");
});
