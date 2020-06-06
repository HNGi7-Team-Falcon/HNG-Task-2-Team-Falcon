def internDetails():
    details = {
        "name":"Akinwumi oladotun",
        "ID":"HNG-01436",
        "email":"dotunak@gmail.com",
        "language":"python"
    }

    output = "Hello World, this is {name} with HNGi7 ID {ID} using {language} for stage 2 task. {email}".format(
        name=details["name"], ID=details["ID"], email=details["email"], language=details["language"])

    print(output)

    return output


internDetails()
