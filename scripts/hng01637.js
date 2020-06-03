let name = 'Adetayo Akinsanya',
  id = 'HNG-01637',
  email = 'akinsanyaadetayo@gmail.com',
  language = 'JavaScript';

const myInfo = () => {
  let description = `Hello world, this is ${name} with HNGi7-ID ${id} using ${language} for stage 2 task. ${email}`;

  console.log(description);
  return description;
};

myInfo();
