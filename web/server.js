const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));

// Handle signup request
app.post('/signup', (req, res) => {
  // Validate and save the signup data to the database
  // For simplicity, we assume the signup is successful here
  const response = { success: true };
  res.json(response);
});

// Handle login request
app.post('/login', (req, res) => {
  // Validate the login credentials
  // For simplicity, we assume the login is successful here
  const response = { success: true };
  res.json(response);
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
