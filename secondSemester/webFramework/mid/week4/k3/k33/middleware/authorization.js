function authorizeRoles(...requiredRoles) {
  return (req, res, next) => {
    if (!req.user) {
      return res.status(401).send("Not logged in.");
    }
    const { role } = req.user;

    if (!requiredRoles.includes(role)) {
      return res.status(403).send("Access Denied");
    }

    next();
  };
}

module.exports = { authorizeRoles };
