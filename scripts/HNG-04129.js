function task2() {
     const details = {
         name: "Tolu Smith",
         id: "HNG-04129",
         mail: "smyxbrone@gmail.com"
     };
     let {
         name,
         id,
         mail
     } = details;

   return `Hello World, this is ${name}, with HNGi7 ID ${id} using javascript for stage 2 task. ${mail}`;
     
 }

 console.log(task2());
