import json

email= "omofuomajoy@gmail.com"
task= "Hello World, this is Omofuoma Joy Oghenemarho with HNGi7 ID HNG-02232 using Python for stage 2 task. omofuomajoy@gmail.com"
file ='task.json'
with open(file, 'w') as f_obj:
  json.dump(task, f_obj)
  print(task)
