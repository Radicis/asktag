from django import forms
from django.contrib.auth.models import User
from django.contrib.auth.forms import UserCreationForm
from userprofile.models import UserProfile
from captcha.fields import CaptchaField


#inherits from UserCreationForm
class MyRegistrationForm(UserCreationForm):		
	captcha = CaptchaField(required=True)	
	class Meta:
		model = User
		fields = ('username', 'password1', 'password2')		
	
	def save(self, commit=True):
		user = super(MyRegistrationForm, self).save(commit=False)
				
		if commit:
			user.save()
			#makes a copy to userprofile
			#user.profile			
	
		return user