import json

class Intern(object):
    def __init__(self):
        self.full_name = 'AbdulJaleel AbdulSamad'
        self.ID = 'HNG-05772'
        self.language  = 'python'
        self.Email = 'abduljaleel_abdulsamad@yahoo.com'

Intern= Intern()
print('Hello World, this is {} with HNGi7 ID {} using {} for stage 2 task. {}'.format(Intern.full_name, Intern.ID, Intern.language, Intern.Email))
s = json.dumps(Intern.__dict__) 
print(s, flush = True)
