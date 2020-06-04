import json

info = {
    'file':'ayokoya.py',
    'fname':'Ayomide',
    'lname':'Odukoya',
    'Id':'HNG-01201',
    'lang':'Python',
    'email':'odukoyaayomide81@hotmail.com'
}

string =("Hello World,", "this is", 'Ayomide', "Odukoya", "with HNGi7 ID", 'HNG-01201', "using",  'Python',  "for stage 2 task." + info['email'] )
result = " ".join(string)
output = json.dumps(info)
print(result)

    