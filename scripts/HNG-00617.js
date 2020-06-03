function Script(name,hngId,language){
  this.name=name;
  this.hngId=hngId;
  this.language=language;
}
Script.prototype.greetings=function(){
  return `Hello World, this is ${this.name} with HNGi7 ID ${this.hngId} using ${this.language} for stage 2 task`
}
const details=new Script('Faniran Tobi','HNG-00617','Javascript');
console.log(details.greetings())

