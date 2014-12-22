from django.db import models
from django.contrib.auth.models import User

		
class SeparatedValuesField(models.TextField):
    __metaclass__ = models.SubfieldBase

    def __init__(self, *args, **kwargs):
        self.token = kwargs.pop('token', ' ')
        super(SeparatedValuesField, self).__init__(*args, **kwargs)
		
    def to_python(self, value):
		if not value: return value		
		if isinstance(value, list):
			return value
		return value.split(self.token)

    def get_db_prep_value(self, value, connection, prepared):
		if not value: return		
		assert(isinstance(value, list) or isinstance(value, tuple))
		tags = []
		for tag in value:
			tags.append(tag.strip())
		return self.token.join([unicode(s) for s in tags])

    def value_to_string(self, obj):		
		value = self._get_val_from_obj(obj)
		return self.get_db_prep_value(value)
		
#class tag(models.Model):
	#name = models.CharField(max_length=100)
	
class Comment(models.Model):
	posted_by = models.ForeignKey(User, blank=True, null=True)
	body = models.TextField()
	pub_date = models.DateTimeField(auto_now_add=True)
	related_article = models.ForeignKey('Article', null=True)	
	related_answer = models.ForeignKey('Answer', null=True)
	likes = models.IntegerField(default=0)
	liked_by = SeparatedValuesField(default=' ')
	#is_answer = models.BooleanField(default=False)
	
class Answer(models.Model):
	posted_by = models.ForeignKey(User, blank=True, null=True)
	body = models.TextField()
	pub_date = models.DateTimeField(auto_now_add=True)
	related_article = models.ForeignKey('Article')	
	likes = models.IntegerField(default=0)
	liked_by = SeparatedValuesField(default=' ')
	num_comments = models.IntegerField(default=0)
	is_answer = models.BooleanField(default=False)
	comments = models.ManyToManyField(Comment)
	
class Article(models.Model):
	title = models.CharField(max_length=200)
	body = models.TextField()
	pub_date = models.DateTimeField(auto_now_add=True)
	likes = models.IntegerField(default=0)
	tags = SeparatedValuesField()
	answered = models.BooleanField(default=False)
	num_answers = models.IntegerField(default=0)
	liked_by = SeparatedValuesField(default=' ')
	posted_by = models.ForeignKey(User, blank=True, null=True)
	num_comments = models.IntegerField(default=0)
	comments = models.ManyToManyField(Comment)
	answers = models.ManyToManyField(Answer)	
		
	class Meta:
		ordering = ["-pub_date"]	
	
	def __unicode__(self):
		return self.title


