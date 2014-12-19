from django.shortcuts import render
from django.shortcuts import render_to_response
from django.http import HttpResponse
from django.http import HttpResponseRedirect
from django.core.context_processors import csrf
from django.views.generic.base import TemplateView
from django.db.models import Count
from django.utils import timezone
import re

from django.contrib.auth.decorators import login_required

from article.models import Article, Comment

from forms import ArticleForm
from forms import CommentForm


#helper functions

def getTopPosts(num):
	posts = Article.objects.annotate(num_likes=Count('likes'))
	posts = posts[:num]
	return posts

	
#base template view

class BasePostsView(TemplateView):
	template_name = 'base.html'
	type = ""
	
	def get_context_data(self, **kwargs):
		context = super(BasePostsView, self).get_context_data(**kwargs)
		context['topPosts']= getTopPosts(5)

		if self.kwargs.get('tag'):			
			context['articles'] = Article.objects.filter(tags__contains=self.kwargs.get('tag'))
			context['tag'] = self.kwargs.get('tag')
		else:
			context['articles'] = Article.objects.all()
			
		return context

	
	'''
#display all articles
def articles(request):

	args = {}
	args.update(csrf(request))
	
	args['articles'] = Article.objects.all()
	args['topPosts'] = getTopPosts(5)
	return render(request, 'articles.html', args)
	
'''	
#display article details
def article(request, article_id=1):
	article = Article.objects.get(id=article_id)
	#adds comment form to article page
	args = {}
	args.update(csrf(request))
	args['topPosts']= getTopPosts(5)
	args['comment_form'] = CommentForm()
	args['user'] = request.user
	args['comments'] = Comment.objects.filter(article=article_id)
	args['article'] = article
	
	return render(request, 'article.html', args)




#create article	
#decorator - auto checks if user is logged in and if not it redirects to login page
@login_required
def create(request):
	
	if request.POST:		
		form = ArticleForm(request.POST)		
		
		if form.is_valid():
			article = form.save(commit=False)
			article.posted_by = request.user
			article.save()			
			return HttpResponseRedirect('/')
	else:
		form = ArticleForm()
		
	args = {}
	args.update(csrf(request))
	args['topPosts']= getTopPosts(5)
	
	args['form'] = form	
	
	return render(request, 'create_article.html', args)

@login_required	
def like_article(request, article_id):
	if article_id:
		a = Article.objects.get(id=article_id)
		#check if user liked this before
		if request.user.username in a.liked_by:
			return HttpResponseRedirect(request.META.get('HTTP_REFERER'))
		else:
			a.likes +=1
			a.liked_by.append(request.user.username)
			a.save()
	return HttpResponseRedirect(request.META.get('HTTP_REFERER'))
	
@login_required	
def like_comment(request, comment_id):
	if comment_id:
		c = Comment.objects.get(id=comment_id)
		#check if user liked this before
		if request.user.username in c.liked_by:
			return HttpResponseRedirect(request.META.get('HTTP_REFERER'))
		else:
			c.likes +=1
			c.liked_by.append(request.user.username)
			c.save()
	return HttpResponseRedirect(request.META.get('HTTP_REFERER'))
	
@login_required	
def accept_answer(request, comment_id):
	
	if comment_id:
		c = Comment.objects.get(id=comment_id)		
		a = c.article
		if a.posted_by == request.user:
			#check if already an answer
			if not c.is_answer:
				c.is_answer = True	
				c.body = "hello adam"
				c.save()
			if not a.answered:
				a.answered = True
				a.save()
			
	return HttpResponseRedirect(request.META.get('HTTP_REFERER'))
	
@login_required	
def create_comment(request, article_id):
	a = Article.objects.get(id=article_id)
	
	if request.POST:
		f = CommentForm(request.POST)
		if f.is_valid():
			c = f.save(commit=False)
			c.pub_date = timezone.now()
			c.article = a
			c.posted_by = request.user
			c.save()
			a.comments += 1
			a.save()
			#increment_posts(request.user)
			
			return HttpResponseRedirect('/get/%s' % article_id)
	else:
		f = CommentForm()
	
	args = {}
	args.update(csrf(request))
	args['article'] = a
	args['form'] = f
	
	return render(request, 'add_comment.html', args)
	
def search_titles(request):
	if request.POST:
		search_text = request.POST['search_text']
	else:
		search_text = ''
	
	articles = Article.objects.filter(title__icontains=search_text) | Article.objects.filter(body__icontains=search_text) | Article.objects.filter(tags__icontains=search_text)
	
	return render_to_response('ajax_search.html', {'articles':articles})

def view_tags(request):
		
	tags = []
	articles = Article.objects.all()
	for article in articles:
		for tag in article.tags:
			if tag not in tags:
				tags.append(tag)
	args = {}
	args['topPosts']= getTopPosts(5)
	args['tags'] = tags
	return render(request, 'tags.html', args)
	
@login_required	
def my_questions(request):
	
	articles = Article.objects.all().filter(posted_by=request.user)
	
	args = {}
	args.update(csrf(request))
	
	args['articles'] = articles
	args['topPosts'] = getTopPosts(5)
	return render(request, 'articles.html', args)
	
def unanswered(request):
	
	articles = Article.objects.all().filter(answered=False)
	
	args = {}
	args.update(csrf(request))
	
	args['articles'] = articles
	args['topPosts'] = getTopPosts(5)
	return render(request, 'articles.html', args)	
	
def about_page(request):
	args = {}
	args['topPosts']= getTopPosts(5)	
	return render(request, 'about.html', args)
