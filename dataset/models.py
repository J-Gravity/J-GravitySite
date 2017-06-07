# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models

# Create your models here.

class Dataset(models.Model):
	created = models.DateTimeField(auto_now_add=True)
	updated = models.DateTimeField(auto_now=True)
	first_name = models.CharField(max_length=255)
	last_name = models.CharField(max_length=255)
	
	def __str__(self):
		return self.first_name
