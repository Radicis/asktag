from django.db import models
from django.contrib.auth.models import User
from django.conf import settings



class UserProfile(models.Model):
	user = models.OneToOneField(User)
	avatar = models.ImageField(upload_to=settings.MEDIA_URL, blank=True, null=True)
	email = models.CharField(max_length=100)
	posts  = models.IntegerField(default=0)
	
	def __unicode__(self):
		return unicode(self.user)

	def increment_posts(self):
		self.posts += 1
		self.save()
	
	def avatar_image(self):
		return (settings.MEDIA_URL + self.avatar.name) if self.avatar else None
	
User.profile = property(lambda u: UserProfile.objects.get_or_create(user=u)[0])




