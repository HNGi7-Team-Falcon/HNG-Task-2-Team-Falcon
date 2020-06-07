full_name = 'Olayinka Olasunkanmi'
hng_id = 'HNG-00142'
language = 'Python'
email = 'sj.olayinka@gmail.com'


class Intern:
    def __init__(self, name, id, language, email):
        self.name = name
        self.id = id
        self.language = language
        self.email = email

    def introduction(self):
        return f'Hello World, this is {self.name} with HNGi7 ID {self.id} using {self.language} for stage 2 task'


Olasunkanmi = Intern(full_name, hng_id, language, email)
print(Olasunkanmi.introduction())