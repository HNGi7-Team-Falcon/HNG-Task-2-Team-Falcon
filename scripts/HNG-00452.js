const output = () =>{
    const info = {
        fullName: "Raheem Abeeb Ishola",
        hngId: "HNG-00452",
        language: "javascript",
        email: "belovetech@gmail.com"
    }
    return 'Hello World, this is '  + info.fullName + ' with HNGi7 ID ' +
            info.hngId + ' using ' + info.language + ' for stage 2 task. ' + info.email
}

console.log(output());
