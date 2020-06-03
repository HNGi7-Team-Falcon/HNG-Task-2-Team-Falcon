
let firstName = "Iyanuoluwa"
let lastName = "Sowande"

const myDetails = 
{

    fullName: firstName + " " +lastName,
    ID: "HNG-00203",
    language: "JavaScript",
    mail: "iyanusowande@gmail.com",
    displayDetails: function ()
        {
            console.log(`Hello World, this is ${this.fullName} with HNGi7 ID ${this.ID} using ${this.language} for stage 2 task. ${this.mail}`);
        }   


};


myDetails.displayDetails();