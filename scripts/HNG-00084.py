def internDetails():
    details = {
        "name":"Adebayo Onuchukwu",
        "ID":"HNG-00084",
        "email":"adebayop.o@gmail.com",
        "language":"python"
    }

    output = "Hello World, this is {name} with HNGi7 ID {ID} using {language} for stage 2 task. {email}".format(
        name=details["name"], ID=details["ID"], email=details["email"], language=details["language"])

    print(output)

    return output


internDetails()