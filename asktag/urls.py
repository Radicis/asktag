from django.conf.urls import patterns, include, url
from django.contrib import admin
from django.conf import settings

from django.views.generic.edit import CreateView
from forms import MyRegistrationForm 
from article.views import BasePostsView

admin.autodiscover()

urlpatterns = patterns('',


	#home
	url(r'^$', BasePostsView.as_view(template_name='articles.html')),
	
	url(r'^like/(?P<article_id>\d+)/$', 'article.views.like_article', name='likeAricle'),
	
	url(r'^like_comment/(?P<comment_id>\d+)/$', 'article.views.like_comment', name='likeComment'),
	
	url(r'^accept_answer/(?P<answer_id>\d+)/$', 'article.views.accept_answer', name='accept'),
	
	url(r'^get/(?P<article_id>\d+)/$', 'article.views.article'),
		
	#user questions
	url(r'^myquestions/$', 'article.views.my_questions'),
	
	#unanswered
	url(r'^unanswered/$', 'article.views.unanswered'),
	
	#create post
	url(r'^create/$', 'article.views.create'),
	
	#create comment
	url(r'^comment/(?P<article_id>\d+)/$', 'article.views.create_comment'),
	
	#create Answer
	url(r'^answer/(?P<article_id>\d+)/$', 'article.views.create_answer'),
	
	#display tags
	url(r'^tags/$', 'article.views.view_tags'),
	url(r'^viewtag/(?P<tag>\d+|\w+)/$', BasePostsView.as_view(template_name='articles.html')),
	
	#ajax search
	url(r'^search/$', 'article.views.search_titles'),
	
	
	#user login
	url(r'^accounts/login/$', 'asktag.views.login'),
	url(r'^accounts/auth/$', 'asktag.views.auth_view'),
	url(r'^accounts/logout/$', 'asktag.views.logout'),
	url(r'^accounts/loggedin/$', 'asktag.views.loggedin'),
	url(r'^accounts/invalid/$', 'asktag.views.invalid_login'),
	
	#user profile page
	url(r'^accounts/profile/$', 'userprofile.views.user_profile'),
	
	#user registration
	#url(r'^accounts/register/$', CreateView.as_view(template_name='register.html',form_class=MyRegistrationForm, success_url='/accounts/register_success/')),
	url(r'^accounts/register/$', 'asktag.views.register_user'),
	url(r'^accounts/register_success/$', 'asktag.views.register_success'),
	
	#articles
	#url(r'^articles/', include('article.urls')),
	
	#about page
	url(r'^about/', 'article.views.about_page'),
	
	#admin
    url(r'^admin/', include(admin.site.urls)),
	
)

if settings.DEBUG:
    urlpatterns += patterns('',
        url(r'^media/(?P<path>.*)$', 'django.views.static.serve', {
            'document_root': settings.MEDIA_ROOT,
        }),
        url(r'^static/(?P<path>.*)$', 'django.views.static.serve', {
            'document_root': settings.STATIC_ROOT,
        }),
)