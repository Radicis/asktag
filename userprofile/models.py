from django.db import models
from django.contrib.auth.models import User
from django.conf import settings


class UserProfile(models.Model):
	user = models.OneToOneField(User)
	#needed to make it auto generate this profile
	#email = models.EmailField(max_length=254)	
	posts  = models.IntegerField(default=0)
	#has_posted_recently = models.BooleanField(default=False)
	
	def __unicode__(self):
		return unicode(self.user)

	def increment_posts(self):
		self.posts += 1
		self.save()

		
User.profile = property(lambda u: UserProfile.objects.get_or_create(user=u)[0])




