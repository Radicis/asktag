from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.core.context_processors import csrf
from django.contrib.auth.decorators import login_required
from PIL import Image

from forms import UserProfileForm


#decorator - auto checks if user is logged in and if not it redirects to login page
@login_required
def user_profile(request):
	if request.method == 'POST':
		#populate form with details of user profile instance from the post info
		form = UserProfileForm(request.POST, instance=request.user.profile)
		if form.is_valid():
			u = form.save(commit=False)
			#profile = u.profile
			#profile.save()
			u.save()
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