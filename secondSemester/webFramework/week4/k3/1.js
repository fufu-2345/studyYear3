const jwt = require("jsonwebtoken");
const token = jwt.sign({ username: "sweetTeacher" }, "secretKey", {
  expiresIn: "1h",
});
console.log("Token:", token);
const decoded = jwt.verify(token, "secretKey");
console.log("Decoded:", decoded);
