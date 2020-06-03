const myInfo = (name, id, email, language) => {
  let description = `Hello world, this is ${name} with HNGi7 ID ${id} and email ${email} using ${language} for stage 2 task`;

  console.log(description);
  return description;
};

myInfo(
  'Adetayo Akinsanya',
  'HNG-01637',
  'akinsanyaadetayo@gmail.com',
  'JavaScript'
);
