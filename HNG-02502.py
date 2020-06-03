import re
#print HNG user detail
open= True
def Open(open):
	global Open
	global cmd
	cmd=re.sub(" ", "",input(('Program to check my HNG user details\n To check Input : Yes\n To End input: End\n >>')).lower())
	global usr	
	def user(cmd):
		if cmd == 'yes':
			print('Hello world')
			print('Full name: Samuel Jonathan')
			print('User ID : 02502')
			print('Programming Language: Python')
		elif cmd == 'end':
			print('Program Closed thanks for checking\nPlease grade me well')
		else :
			print('Oops wrong entry!')
			exit()
		

Open(open)
user(cmimport re
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
