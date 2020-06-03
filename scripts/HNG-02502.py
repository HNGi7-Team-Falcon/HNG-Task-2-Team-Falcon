import re
#print HNG user detail
open= True
def Open(open):
	global Open
	global cmd
	cmd=re.sub(" ", "",input(('Program to check my HNG user details\n To check Input : Yes\n To End input: End\n >>')).lower())
	global user	
	def user(cmd):
		if cmd == 'yes':
			print('Hello world')
			print('Full name: Samuel Jonathan\nUser ID :02502\nProgramming Language: Python\nEmail:Omohsam81@gmail.com')
		elif cmd == 'end':
			print('Program Closed thanks for checking\nPlease grade me well')
		else :
			print('Oops wrong entry!')
			exit()
		

Open(open)
user(cmd)
