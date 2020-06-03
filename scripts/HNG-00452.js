const output = () =>{
    const info = {
        fullName: "Raheem Abeeb Ishola",
        hngId: "HNG-00452",
        language: "javascript",
        email: "belovetech@gmail.com"
    }
    return 'Hello World, this is '  + info.fullName + ' with HNG ID ' +
            info.hngId + ' using ' + info.language + ' for stage 2 task.'
}

console.log(output());