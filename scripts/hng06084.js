const express = require("express");
const app = express();

app.get("/", (req, res) => {
  res.send('Hello World, this is Ajayi Solomon with HNGi7 ID hng-06084 using Javascript for stage 2 task');
});
app.listen(3000, () => {
  console.log('Example app listening on port 3000!');
});
