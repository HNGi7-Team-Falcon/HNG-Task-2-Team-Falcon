myTask = () => {
    let details = {
        name: "Emediong Ini",
        hng_id: "HNG-01606",
        preferredLanguage: "Javascript",
        email: "emediongini@gmail.com",
    }
<<<<<<< Updated upstream
    let myOutput = `Hello World, this is ${details.name} with HNGi7 ID ${details.hng_id} using ${details.preferredLanguage} for stage 2 task. ${details.email}`
=======
    let myOutput = `Hello World, this is ${details.name} with HNGi7 ID ${details.hng_id} using ${details.preferredLanguage} for stage 2 Task. ${details.email}`
>>>>>>> Stashed changes
    console.log(myOutput)
}
myTask()