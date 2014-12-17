from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.contrib import auth
from django.core.context_processors import csrf
#from django.contrib.auth.forms import UserCreationForm
from forms import MyRegistrationForm
from django.contrib.auth import authenticate

#User registration views

def register_user(request):
	#first time it doesn't post, next time it does
	if request.method == 'POST':
		#form = UserCreationForm(request.POST)
		form = MyRegistrationForm(request.POST)
		if form.is_valid():
			#add email confirmation
			form.save()
			return HttpResponseRedirect('/accounts/register_success')
			
	args = {}
	args.update(csrf(request))
	
	args['form'] = MyRegistrationForm()
	
	return render(request, 'register.html', args)
	
def register_success(request):
	return render(request, 'register_success.html', {})
	

#User login views

def login(request):
	c = {}
	c.update(csrf(request))
	return render(request, 'login.html', c)
	
def auth_view(request):
	username = request.POST.get('username', '')
	password = request.POST.get('password', '')
	user = auth.authenticate(username=username, password=password)
	
	if user is not None:
		auth.login(request, user)
		return HttpResponseRedirect('/accounts/loggedin')
	else:
		return HttpResponseRedirect('/accounts/invalid')

def loggedin(request):
	return render(request, 'loggedin.html', {'full_name':request.user.username})
	
def invalid_login(request):
	return render(request, 'invalid_login.html', {})
	
def logout(request):
	auth.logout(request)
	return render(request, 'logout.html', {})