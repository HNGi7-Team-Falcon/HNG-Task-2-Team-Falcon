// Task 2:
// crate a function that returns a text as below:
// "Hello World, this is [full name] with HNGi7 ID [ID] using [language] for stage 2 task".
function returnText(fullName, id, language, email) {
  return `Hello World, this is ${fullName} with HNGi7 ID ${id} and using ${language} for stage 2 task. ${email}`;
}

console.log(
  returnText(
    "Mohammed Rahman",
    "HNG-02363",
    "JavaScript",
    "minhaz357@gmail.com",
  ),
);