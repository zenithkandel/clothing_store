const express = require("express");

const app = express();
const PORT = 3000;

// Middleware to parse URL-encoded bodies
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

const path = require("path");

app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "index.html"));
});



app.listen(PORT, () => {
  console.log(`Proxy running at http://localhost:${PORT}`);
});