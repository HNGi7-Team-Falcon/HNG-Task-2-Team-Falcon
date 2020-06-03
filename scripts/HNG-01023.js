const name = 'Tofunmi Osho';
const id = 'HNG-01023';
const language = 'JavaScript';
const email = 'oshotofunmi@gmail.com';

class Greeting {
  constructor(name, id, language, email) {
    this.name = name;
    this.id = id;
    this.language = language;
    this.email = email;
  }

  greet() {
    return `Hello World, this is ${this.name} with HNGi7 ID ${this.id} using ${this.language} for stage 2 task. ${this.email}`
  }
}

const greeting = new Greeting(name, id, language, email);
console.log(greeting.greet());