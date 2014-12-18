from django import forms
from models import UserProfile

class UserProfileForm(forms.ModelForm):
	
	class Meta:
		model = UserProfile
		fields = ('avatar', )
	
	def clean_avatar(self):
		avatar = self.cleaned_data['avatar']
		return avatar