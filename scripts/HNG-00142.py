full_name = 'Olayinka Olasunkanmi'
hng_id = 'HNG-00142'
language = 'Python'
email = 'sj.olayinka@gmail.com'


class Intern:
    def __init__(self, name, id_number, language, email):
        self.name = name
        self.id_number = id_number
        self.language = language
        self.email = email

    def introduction(self):
        return f"Hello World, this is {self.name} with HNGi7 ID {self.id_number} using {self.language} for stage 2 task. {self.email}"


olasunkanmi = Intern(full_name, hng_id, language, email)
print(olasunkanmi.introduction())