from django import forms
from models import Article
from models import SeparatedValuesField
from models import Comment
from django.db import models
from django.contrib.auth.models import User

#class extends forms.ModelForm
class ArticleForm(forms.ModelForm):
	
	tags = SeparatedValuesField(default=" ")
	
	class Meta:
		model = Article
		fields = ('title', 'body', 'tags')
		
class CommentForm(forms.ModelForm):
	class Meta:
		model = Comment
		fields = ('body',)