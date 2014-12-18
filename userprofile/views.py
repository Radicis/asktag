from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.core.context_processors import csrf
from forms import UserProfileForm
from django.contrib.auth.decorators import login_required
from PIL import Image


#decorator - auto checks if user is logged in and if not it redirects to login page
@login_required
def user_profile(request):
	if request.method == 'POST':
		#populate form with details of user profile instance from the post info
		form = UserProfileForm(request.POST, instance=request.user.profile)
		if form.is_valid():
			u = form.save(commit=False)
			#img = Image.open(request.user.avatar)
			#u.avatar = img
			form.save()
			return HttpResponseRedirect('/accounts/loggedin')
	else:
		#request stores logged in user
		user = request.user
		profile = user.profile
		form = UserProfileForm(instance=profile)
		
	args = {}
	args.update(csrf(request))
	
	args['form'] = form
	
	return render(request, 'profile.html', args)