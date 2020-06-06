// function sayHello() {
//     console.log("Hello World", "this is");
// }
// sayHello();
// function name() {
//     console.log("Praise", "Adegoke", "with HNG ID", "04517");
// }
// name();
// function task() {
//     console.log("using PHP for stage 2 task");
// }
// task()
// function email() {
//     console.log("adegokepraise6@gmail.com");
// }
// function add(hello, name, task, email) {
//     hello + name + task + email;
// }
// add(1, 2, 2, 4);


// var greet = "Hello World!"
// var name = "Adegoke Praise";
// var id = "HNG-04517";
// var lang = "Javascript";
// var email = "adegokepraise6@gmail.com";

// function greeting(greet, name, id, lang, email) {
//     console.log(greet, "My name is", name, "with HNGi7 ID", id, "using", lang, "for stage 2 task.", email);
// }
// greeting()

var greet = "Hello World!"
var name = "Adegoke Praise";
var id = "HNG-04517";
var lang = "Javascript";
var email = "adegokepraise6@gmail.com";

function greeting(greet, name, id, lang, email) {
  return `${greet} My name is ${name}, with HNGi7 ID ${id}, using ${lang} for stage 2 task. ${email}`;
}

console.log(greeting(greet, name, id, lang, email));