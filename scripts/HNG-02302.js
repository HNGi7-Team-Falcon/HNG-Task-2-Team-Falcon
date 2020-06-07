let myDetails = { 
 fullName : "Favour Christopher",
 id : "HNG-02302",
 language : "Javascript",
 email : "kristyeva93@gmail.com"
}
function returnDetails(){
  return (`Hello World, this is ${myDetails.fullName} with HNGi7 ID ${myDetails.id} using ${myDetails.language} for stage 2 task. ${myDetails.email}`);
}
console.log(returnDetails());
