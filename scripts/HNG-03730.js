const hngIntern = {  
	printInternIntroduction : function(){ 
		console.log(`Hello World, this is ${this.fullName} with HNGi7 ID ${this.id} using ${this.language} for stage 2 task. ${this.email}`); 
	} 
}; 
const intern = Object.create(hngIntern); 
intern.fullName = 'Abdullahi Idris'; 
intern.id = 'HNG-3730'; 
intern.language = 'C#';
intern.email = 'myrahama@gmail.com';
intern.printInternIntroduction(); 
