function isAuthenticated(req, res, next) {
  if (req.session.user) {
    next();
  } else {
    res.status(401).send("Access Denied: Please login first.");
  }
}

function authorizeRole(...requiredRoles) {
  return (req, res, next) => {
    if (!req.session.user) {
      return res.status(401).send("Not logged in.");
    }

    const { role } = req.session.user;

    if (!requiredRoles.includes(role)) {
      return res.status(403).send("Access Denied");
    }

    next();
  };
}

module.exports = { isAuthenticated, authorizeRole };
