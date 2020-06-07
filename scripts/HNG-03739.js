const name = "Samuel Onyijne";
const id = "HNG-03739";
const language = "JavaScript";
const email = "samuelonyijne@gmail.com";
const HNGi7 = {
  task1: () =>
    `Hello World, this is ${name} with HNGi7 ID ${id} using ${language} for stage 2 task. ${email}`,
  perform: () => console.log(HNGi7.task1()),
};

HNGi7.perform();
