const fullName = 'Festus Ebin';
const id = 'HNG-04979';
const language = 'JavaScript';
const email = 'ebinfestus@gmail.com';

const output = (fullName, id, language, email) => {
  const updateTask = `Hello World!, this is ${fullName} with HNGi7 ID ${id} and email ${email} using ${language} for stage 2 task.`;
   
  console.log(updateTask);
};
output(fullName, id, language, email);