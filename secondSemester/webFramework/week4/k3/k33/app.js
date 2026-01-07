const express = require("express");
const session = require("express-session");
const bodyParser = require("body-parser");
const jwt = require("jsonwebtoken");
const { authenticateToken } = require("./middleware/jwttoken");
const { authorizeRoles } = require("./middleware/authorization");

const app = express();

const users = [
  { id: 1, username: "admin", password: "admin123", role: "admin" },
  { id: 2, username: "john", password: "john123", role: "staff" },
  { id: 3, username: "nina", password: "nina123", role: "student" },
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
    const token = jwt.sign({ id: userr.id }, "SECRET_KEY", {
      expiresIn: "1h",
    });
    res.json({ token });
  } else {
    res.status(401).send("Invalid credentials.");
  }
});

app.get(
  "/home",
  authenticateToken,
  authorizeRoles("staff", "admin", "student"),
  (req, res) => {
    if (req.user) {
      res.send(
        `ยินดีต้อนรับ ${req.user.username} คุณมีบทบาทคือ ${req.user.role}`
      );
    } else {
      res.status(401).send("Please log in.");
    }
  }
);

app.get(
  "/payment",
  authenticateToken,
  authorizeRoles("staff", "admin"),
  (req, res) => {
    if (req.user) {
      res.send(
        `ยินดีต้อนรับ ${req.user.username} คุณมีบทบาทคือ ${req.user.role}`
      );
    } else {
      res.status(401).send("Please log in.");
    }
  }
);

app.get("/admin", authenticateToken, authorizeRoles("admin"), (req, res) => {
  if (req.user) {
    res.send(
      `ยินดีต้อนรับ ${req.user.username} คุณมีบทบาทคือ ${req.user.role}`
    );
  } else {
    res.status(401).send("Please log in.");
  }
});

app.get(
  "/gradereport",
  authenticateToken,
  authorizeRoles("student"),
  (req, res) => {
    if (req.user) {
      res.send(
        `ยินดีต้อนรับ ${req.user.username} คุณมีบทบาทคือ ${req.user.role}`
      );
    } else {
      res.status(401).send("Please log in.");
    }
  }
);

app.get("/logout", (req, res) => {
  req.session.destroy();
  res.send("You have been logged out.");
});

app.listen(3000, () => {
  console.log("Listening on http://localhost:3000");
});
