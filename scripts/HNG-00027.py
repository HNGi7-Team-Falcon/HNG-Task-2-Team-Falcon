import json

email= "momohkeshi@yahoo.com"
output= "Hello World, this is Stephenson Momoh with HNGi7 ID HNG-00027 using Python for stage 2 task. momohkeshi@yahoo.com"
file ='output.json'
with open(file, 'w') as f_obj:
  json.dump(output, f_obj)
  print(output)
  
