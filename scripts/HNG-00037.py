"""Second task that qualifies an intern to stage 2."""

def task(fullname, id, lang,email):
    return f"Hello world, this is {fullname} with HNGi7 ID {id} and email {email} using {lang} for stage 2 task."


fullname= 'Philip Ireoluwa Okiokio'
id= 'HNG-00037'
lang= 'python'
email= 'philipokiokiocodes@gmail.com'


print(task(fullname,id,lang, email), flush= True)
