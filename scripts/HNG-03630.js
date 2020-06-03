const fullName = "Adewumi Victor";
const intId = "HNG-03630";
const lang = "Javascript";
const email = "adevic4christ@gmail.com";

(() => {
  const info = `Hello World, this is ${fullName} with HNGi7 ID ${intId} using ${lang} for stage 2 task. ${email}`;
  process.stdout.write(info);
  return info;
})();