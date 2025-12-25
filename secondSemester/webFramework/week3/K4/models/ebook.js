const mongoose = require('mongoose');
const ebookSchema = new mongoose.Schema({
  title: String,
  description: String,
  author: {
    type: mongoose.Schema.Types.ObjectId,
    ref: 'User',
    default: null
  }
});

module.exports = mongoose.model('Ebook', ebookSchema);