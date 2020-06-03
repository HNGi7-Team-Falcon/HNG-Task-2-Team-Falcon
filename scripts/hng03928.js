const davis = {
	name: 'Davis Gitonga',
	id: 'HNG-03928',
	language: 'JavaScript',
};

const outputMessage = (name, id, language) => {
	return `Hello World, this is ${name} with HNGi7 ID ${id} using ${language} for stage 2 task.`;
};

console.log(outputMessage(davis.name, davis.id, davis.language));
