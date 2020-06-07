import json

email= "eniwokepdm@gmail.com"
hng_id = "HNG-06224"
name = "Adah Eni"
output= f"Hello World, this is {name} with HNGi7 ID {hng_id} using Python for stage 2 task. {email}"
file ='output.json'
with open(file, 'w') as f_obj:
  json.dump(output, f_obj)
  print(output)
  
