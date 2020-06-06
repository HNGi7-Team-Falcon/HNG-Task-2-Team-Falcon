let user = {
  fullName: "Ikennam Nelson",
  language: "JavaScript",
  HngID: "HNG-02645",
  email: "ameddynelson@gmail.com"
};

function myDetails(){
  const message = `Hello World, this is ${user.fullName} with HNGi7 ID ${user.HngID} and email ${user.email} using ${user.language} for stage 2 task`;
  console.log(message);
}

myDetails()
