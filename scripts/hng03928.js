const davis = {
	name: 'Davis Gitonga',
	id: 'HNG-03928',
	language: 'JavaScript',
	email: 'davisgitonganyaga@gmail.com',
};

const outputMessage = (name, id, email, language) => {
	return `Hello World, this is ${name} with HNGi7 ID ${id} using ${language} for stage 2 task. ${email}`;
};

console.log(outputMessage(davis.name, davis.id, davis.email, davis.language));
