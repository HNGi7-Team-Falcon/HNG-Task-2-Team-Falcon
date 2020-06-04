function greet_world(data) {
  const { name, id, email, language } = data;
  return `Hello World, this is ${name} with HNGi7 ID ${id} using ${language} for stage 2 task. ${email}`;
}

const greeting = greet_world({
  name: "Madufor Chiemeka",
  id: "HNG-00953",
  email: "maduforreynolds@yahoo.com",
  language: "JavaScript",
});

console.log(greeting);
