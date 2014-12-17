from django.conf.urls import patterns, include, url
from django.contrib import admin


from article.views import BasePostsView

admin.autodiscover()

urlpatterns = patterns('',
	#testing
	url(r'^simple/', include('simple.urls')),

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
	url(r'^accounts/login/$', 'asktag.views.login'),
	url(r'^accounts/auth/$', 'asktag.views.auth_view'),
	url(r'^accounts/logout/$', 'asktag.views.logout'),
	url(r'^accounts/loggedin/$', 'asktag.views.loggedin'),
	url(r'^accounts/invalid/$', 'asktag.views.invalid_login'),
	
	#user profile page
	url(r'^accounts/profile/$', 'userprofile.views.user_profile'),
	
	#user registration
	url(r'^accounts/register/$', 'asktag.views.register_user'),
	url(r'^accounts/register_success/$', 'asktag.views.register_success'),
	
	#articles
	#url(r'^articles/', include('article.urls')),
	
	#about page
	url(r'^about/', 'article.views.about_page'),
	
	#admin
    url(r'^admin/', include(admin.site.urls)),
	
)
