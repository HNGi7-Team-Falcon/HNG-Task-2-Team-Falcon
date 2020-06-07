import json

def intro():
    full_name="Cumi Oyemike"
    ID="HNG-03005"
    lang="Python"
    email="cuoyemike@gmail.com"
   
    message = print("Hello World, this is " + full_name + " with HNGi7 ID " + ID + " using " + lang + " for stage 2 task. " + email, flush=True)
    return json.dumps(message)
intro()

exit