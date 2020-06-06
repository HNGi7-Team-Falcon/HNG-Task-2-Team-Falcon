var message = 'Hello World';
var info = {
	name: 'Tolulope Olufotebi',
	HNGi7ID: '03970',
	language: 'JavaScript',
	emailAddress: 'tolu.olufotebi@gmail.com'
};

console.log(
	(message +=
		' This is ' +
		info.name +
		' with HNGi7 ID ' +
		info.HNGi7ID +
		' using ' +
		info.language +
		' stage 2 task. ' +
		info.emailAddress)
);
