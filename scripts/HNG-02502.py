import re
import json
#
	def user(cmd):
		comment='Program Closed thanks for checking\nPlease grade me well!'
		if cmd == 'yes':
			print('Hello world')
			my_data={'Full name': 'Samuel Jonathan',
			'User ID': '02502',
			'Programming Language': 'Python',
			'Email': 'omohsam81@gmail.com'}
			to_json=json.dumps(my_data)
			print(to_json)
			print(comment)	
		elif cmd == 'end':
			print(comment)	
		else :
			print('Oops wrong entry!')
			exit()
		

Open(open)
user(cmd)
