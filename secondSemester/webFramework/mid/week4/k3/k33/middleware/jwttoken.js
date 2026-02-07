const jwt = require("jsonwebtoken");

const users = [
  { id: 1, username: "admin", password: "admin123", role: "admin" },
  { id: 2, username: "john", password: "john123", role: "staff" },
  { id: 3, username: "nina", password: "nina123", role: "student" },
];

function authenticateToken(req, res, next) {
  const authHeader = req.headers["authorization"];
  const token = authHeader && authHeader.split(" ")[1];
  if (!token) return res.sendStatus(401);

  jwt.verify(token, "SECRET_KEY", (err, decoded) => {
    if (err) return res.sendStatus(403);
    const user = users.find((u) => u.id === decoded.id);

    if (!user) {
      return res.status(404).send("User not found");
    }
    req.user = user;
    next();
  });
}

module.exports = { authenticateToken };
