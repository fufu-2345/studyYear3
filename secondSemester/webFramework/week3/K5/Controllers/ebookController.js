const User = require('../models/userm.js');
const Ebook = require('../models/ebook.js');

exports.createUser = async (req, res) => {
  try {
    const user = new User(req.body);
    const saved = await user.save();
    console.log(saved);
    res.json(saved);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};
 
// Read all
exports.getAllUsers = async (req, res) => {
  const users = await User.find();
  res.json(users);
};

exports.updateUser = async (req, res) => {
  try {
    const updated = await User.findByIdAndUpdate(req.params.id, req.body, { new: true });
    res.json(updated);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};

// list all ebook
exports.getAllEbook = async (req, res) => {
    try {
        const ebooks = await Ebook.find().populate('author', 'username joindate'); 
            // populate เฉพาะบาง field
            res.status(200).json(ebooks);
        } catch (err) {
            res.status(500).json({ error: 'Failed to fetch ebooks', details: err.message });
    }
};

exports.getNoAuth = async (req, res) => {
    try {
        const ebooks = await Ebook.find({author: null}); 
            // populate เฉพาะบาง field
            res.status(200).json(ebooks);
        } catch (err) {
            res.status(500).json({ error: 'Failed to fetch ebooks', details: err.message });
    }
};

exports.updateData = async (req, res) => {
    try {
        const user = await User.findOne({ username: req.params.username });
        const updated = await Ebook.findByIdAndUpdate(
            req.params.ebookid,
            { ...req.body, author: user._id },
            { new: true }
        ).populate('author', 'username joindate');
        res.json(updated);
    } catch (err) {
        res.status(400).json({ error: err.message });
    }
};

exports.addEBook = async (req, res) => {
  try {
    const ebook = new Ebook(req.body);
    const saved = await ebook.save();
    console.log(saved);
    res.json(saved);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};