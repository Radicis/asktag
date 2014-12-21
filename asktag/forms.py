from django import forms
from django.contrib.auth.models import User
from django.contrib.auth.forms import UserCreationForm
from userprofile.models import UserProfile
from captcha.fields import CaptchaField


#inherits from UserCreationForm
class MyRegistrationForm(UserCreationForm):	
	model = UserProfile
	#email = forms.EmailField(required=True)
	#captcha = CaptchaField()
	fields = ('username', 'password1', 'password2', 'email')
	
	def save(self, commit=True):
		user = super(MyRegistrationForm, self).save(commit=False)
		#user.email = self.cleaned_data['email']
		
		if commit:
			user.save()
			#makes a copy to userprofile
			#user.profile

			
			#new_profile = UserProfile(user=user)
			#new_profile.save()
	
		return user