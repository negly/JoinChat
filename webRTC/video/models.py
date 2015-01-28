from django.db import models

# Create your models here.
class Video(models.Model):
	ip = models.CharField(max_length=200)
	user = models.CharField(max_length=100)
	date_connection = models.DateTimeField('Date of connection')
	# def __str__(self):
 #        return self.ip