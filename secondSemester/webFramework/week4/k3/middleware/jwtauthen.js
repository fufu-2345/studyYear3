const jwt = require("jsonwebtoken");

function authenticateJWTToken(req, res, next) {
  const authHeader = req.headers["authorization"];
  const token = authHeader && authHeader.split(" ")[1];
  if (!token) {
    return res.sendStatus(401);
  }
  jwt.verify(token, "SECRET_KEY", (err, userData) => {
    if (err) return res.sendStatus(403);
    req.user = userData;
    next();
  });
}

module.exports = { authenticateJWTToken };
