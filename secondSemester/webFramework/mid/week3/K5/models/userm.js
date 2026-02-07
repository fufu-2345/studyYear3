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
    maxlength: 255,
     validate: {
      validator: function (value) {
        return /^[^#@$]{5,8}$/.test(value);
      },
      message: 'รูปแบบรหัสผ่านไม่ถูกต้อง'
    }
  },
  joindate: {
    type: Date,
    default: Date.now
  },
  expirationdate: {
    type: Date
  },
  email: {
    type: String,
    required: [true, 'กรุณาระบุอีเมล'],
    lowercase: true,
    unique: true,
    validate: {
      validator: function (value) {
        // ใช้ regex ตรวจรูปแบบ email (built-in วิธีง่าย)
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
      },
      message: 'รูปแบบอีเมลไม่ถูกต้อง'
    }
  },
});

module.exports = mongoose.model('User', userSchema);
