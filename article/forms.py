from django import forms
from models import Article
from models import SeparatedValuesField
from models import Comment
from models import Answer
from django.db import models
from django.contrib.auth.models import User
from captcha.fields import CaptchaField

#class extends forms.ModelForm
class ArticleForm(forms.ModelForm):
	captcha = CaptchaField()
	#tags = SeparatedValuesField(default=" ")
	
	class Meta:
		model = Article
		fields = ('title', 'body', 'tags', 'captcha')
		
class CommentForm(forms.ModelForm):
	class Meta:
		model = Comment
		fields = ('body',)

class AnswerForm(forms.ModelForm):
	class Meta:
		model = Answer
		fields = ('body',)