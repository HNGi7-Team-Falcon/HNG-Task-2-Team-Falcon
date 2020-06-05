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
<<<<<<< HEAD
print(s)
=======
print(s, flush = True)
>>>>>>> 4bedf0c5da86e5f52f9bc131cdfd06c212d73e81
