
function Person(name, id, lan, email) {
  this.myName = name;
  this.myId = id;
  this.myLan = lan;
  this.myEmail = email;
}

var myF = new Person("Chidiebere Ekennia", "HNG-06601", "Javascript", "chidiebereekennia@gmail.com");

console.log(
"Hello World, This is " + myF.myName + " with HNGi7 ID " + myF.myId +  " using " + myF.myLan + " for stage 2 task. " + myF.myEmail + "." ); 