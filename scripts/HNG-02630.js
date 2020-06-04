var Person = /** @class */ (function () {
    function Person(fullName, hngId, language, stage, email) {
        this.fullName = fullName;
        this.hngId = hngId;
        this.language = language;
        this.stage = stage;
        this.email = email;
    }
    return Person;
}());
function introduce(person) {
    return console.log("Hello World, this is " + person.fullName + " with HNGi7 ID " + person.hngId + " using " + person.language + " for stage " + person.stage + " task. " + person.email);
}
var baby = new Person("Chigbogu Orji", "HNG-02630", "javascript", 2, "brightorji60@gmail.com");
introduce(baby);
