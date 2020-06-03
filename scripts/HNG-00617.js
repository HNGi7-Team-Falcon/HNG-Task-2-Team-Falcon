function Script(name,hngId,language,email){
  this.name=name;
  this.hngId=hngId;
  this.language=language;
  this.email=email;
}
Script.prototype.greetings=function(){
  return `Hello World, this is ${this.name} with HNGi7 ID ${this.hngId} using ${this.language} for stage 2 task. ${this.email}`
}
const details=new Script('Tobi Faniran','HNG-00617','Javascript','tobifaniran@gmail.com');
console.log(details.greetings())

