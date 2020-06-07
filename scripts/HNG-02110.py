def internDetails():
    details = {
        "name":"Agbedor Hope",
        "ID":"HNG-02110",
        "email":"martinshope147@gmail.com",
        "language":"python"
    }

    output = "Hello World, this is {name} with HNGi7 ID {ID} using {language} for stage 2 task. {email}".format(
        name=details["name"], ID=details["ID"], email=details["email"], language=details["language"])

    print(output)

    return output


internDetails()
