const express = require('express');
const router = express.Router();

const people = [
  { name: 'Alice', age: 28, salary: 50000 },
  { name: 'Bob', age: 34, salary: 60000 },
  { name: 'Charlie', age: 25, salary: 55000 }
];

router.get('/people', (req, res) => {
  const nameQuery = req.query.name;
  console.log(nameQuery)
  const person = people.find(p => p.name.toLowerCase() === nameQuery.toLowerCase());
  if (person) {
    res.json(person);
  } else {
    res.status(404).json({ error: 'Person not found.' });
}
});

router.post('/senddata', (req, res) => {
  res.send(`Received ${JSON.stringify(req.body)}`);
});

router.get('/getperson/:name/:age', (req, res) => {
  const nameQuery = req.params.name;
  const ageQuery = Number(req.params.age);
  const person = people.find(p => p.name.toLowerCase() === nameQuery.toLowerCase() && Number(p.age) === ageQuery);
  if (person) {
    res.json(person);
  } else {
    res.status(404).json({ error: 'Person not found.' });
}
});

router.put('/updatesalary/:name/:salary', (req, res) => {
  const nameQuery = req.params.name;
  const salaryQuery = Number(req.params.salary);
  const person = people.find(p => p.name.toLowerCase() === nameQuery.toLowerCase());
  if (person) {
    person.salary=salaryQuery;
  } else {
    res.status(404).json({ error: 'Person not found.' });
  }
  res.json(person);
});

module.exports = router;