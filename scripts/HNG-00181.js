
function Person(name, id, lan, email) {
  this.myName = name;
  this.myId = id;
  this.myLan = lan;
  this.myEmail = email;
}

var myF = new Person("Oluwatoyin Bakare", "HNG-00181", "Javascript", "futoyinbakare@gmail.com");

console.log(
"Hello World, this is " + myF.myName + " with HNGi7 ID " + myF.myId +  " using " + myF.myLan + " for stage 2 task. " + myF.myEmail + "." ); 