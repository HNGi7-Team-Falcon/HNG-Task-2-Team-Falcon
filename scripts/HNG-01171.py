first_name = "Blessing"
last_name="Agadagba"
full_name = first_name + " " + last_name
id = "HNG-01171"
language = "Python"
email = "{}{}@gmail.com".format(last_name.lower(), first_name.lower())
statement= "Hello World, this is {} with HNGi7 ID {} using {} for stage 2 task. {}".format(full_name, id, language, email)
print(statement,flush = True)
