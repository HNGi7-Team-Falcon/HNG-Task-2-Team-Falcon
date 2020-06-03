const myName = 'Zimuzo Obiechina';
const myId = 'HNG-00327';
const myLang = 'JavaScript';
const myEmail = 'zimobie@gmail.com';

const printMessage = (name, id, lang, email) => {
  return `Hello World, this is ${name} with HNGi7 ID: ${id} using ${lang} for stage 2 task. ${email} `;
};

console.log(printMessage(myName, myId, myLang, myEmail));
