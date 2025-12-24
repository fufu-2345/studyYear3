const mongoose = require('mongoose');
const userSchema = new mongoose.Schema({
  username: {
    type: String,
    required: true,
    unique: true,
    maxlength: 100
  },
  userpassword: {
    type: String,
    required: true,
    maxlength: 255
  },
  joindate: {
    type: Date,
    default: Date.now
  },
  expirationdate: {
    type: Date
  }
});

module.exports = mongoose.model('User', userSchema);
