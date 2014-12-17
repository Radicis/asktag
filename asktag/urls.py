from django.conf.urls import patterns, include, url
from django.contrib import admin


from article.views import BasePostsView

admin.autodiscover()

urlpatterns = patterns('',
	#home
	url(r'^$', BasePostsView.as_view(template_name='articles.html')),
	
	url(r'^like/(?P<article_id>\d+)/$', 'article.views.like_article', name='likeAricle'),
	url(r'^get/(?P<article_id>\d+)/$', BasePostsView.as_view(template_name='article.html')),
	
	#create post
	url(r'^create/$', 'article.views.create'),
	
	#create comment
	url(r'^comment/(?P<article_id>\d+)/$', 'article.views.create_comment'),
	
	#display tags
	url(r'^tags/$', 'article.views.view_tags'),
	url(r'^viewtag/(?P<tag>\d+|\w+)/$', BasePostsView.as_view(template_name='articles.html')),
	
	#ajax search
	url(r'^search/$', 'article.views.search_titles'),
	
	
	#user login
	url(r'^accounts/login/$', 'django_test.views.login'),
	url(r'^accounts/auth/$', 'django_test.views.auth_view'),
	url(r'^accounts/logout/$', 'django_test.views.logout'),
	url(r'^accounts/loggedin/$', 'django_test.views.loggedin'),
	url(r'^accounts/invalid/$', 'django_test.views.invalid_login'),
	
	#user registration
	url(r'^accounts/register/$', 'django_test.views.register_user'),
	url(r'^accounts/register_success/$', 'django_test.views.register_success'),
	
	#articles
	#url(r'^articles/', include('article.urls')),
	
	#admin
    url(r'^admin/', include(admin.site.urls)),
	
)
