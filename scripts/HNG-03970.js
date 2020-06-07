let firstName = 'Tolulope';
let lastName = 'Olufotebi';

const myDetails = {
	fullName: firstName + ' ' + lastName,
	ID: 'HNG-03970',
	language: 'JavaScript',
	mail: 'tolu.olufotebi@gmail.com',
	displayDetails: function() {
		console.log(
			`Hello World, this is ${this.fullName} with HNGi7 ID ${this.ID} using ${this
				.language} for stage 2 task. ${this.mail}`
		);
	}
};

myDetails.displayDetails();
