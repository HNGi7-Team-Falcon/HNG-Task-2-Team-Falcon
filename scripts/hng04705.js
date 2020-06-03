const myName = "Apetu Ezekiel Olayori";
const HNG_ID = "HND-04705";

const myInfo = {
  fullName: "Apetu Olayori Ezekiel",
  HNG_ID: "04705",
  spec_Language: "JavaScript",
  currentStage: "Stage 1",
  email: "apetuzee@gmail.com",
};

(function () {
  console.log(
    "Hello World, this is " +
      myInfo.fullName +
      " with HNG7i ID " +
      myInfo.HNG_ID +
      " using " +
      myInfo.spec_Language +
      " for " +
      myInfo.currentStage +
      " task. " +
      myInfo.email
  );
})();

/* I created a const variable amd binded an object containinf all the necessary personal information as requested in the task directives. I then created an IIFE (immediately invoked function expression) that logs out a concatenated string of all the myInfo object information in one meaningful senntence*/
