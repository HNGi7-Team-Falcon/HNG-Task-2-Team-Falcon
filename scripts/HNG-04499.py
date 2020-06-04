my_dict = {
   "name" : "Juma Aisha",
   "hng_id" : "HNG-04499",
   "language" : "Python",
   "email" : "alishadesua1@gmail.com",
   
}
d1 = my_dict.get("name", " ")
d2 = my_dict.get("hng_id", " ")
d3 = my_dict.get("language", " ")
d4 = my_dict.get("email", " ")

print("Hello world, this is" , d1, "with HNGi7 ID" , d2, "using" , d3, "for Stage 2 task.", d4  )