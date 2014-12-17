from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.contrib import auth
from django.core.context_processors import csrf
#from django.contrib.auth.forms import UserCreationForm
from forms import MyRegistrationForm
from django.contrib.auth import authenticate
from django.db.models import Count
from article.models import Article


#helper functions

def getTopPosts(num):
	posts = Article.objects.annotate(num_likes=Count('likes'))
	posts = posts[:num]
	return posts


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
	args = {}
	args.update(csrf(request))
	args['topPosts']= getTopPosts(5)
	return render(request, 'login.html', args)
	
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
	args = {}
	args['topPosts']= getTopPosts(5)
	args['full_name']=request.user.username
	return render(request, 'loggedin.html', args)
	
def invalid_login(request):
	args = {}
	args['topPosts']= getTopPosts(5)
	return render(request, 'invalid_login.html', args)
	
def logout(request):
	args = {}
	auth.logout(request)
	args['topPosts']= getTopPosts(5)
	return render(request, 'logout.html', args)