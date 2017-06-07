# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models

# Create your models here.

class Dataset(models.Model):
	set_name = models.CharField(max_length=255)
	created = models.DateTimeField(auto_now_add=True)
	updated = models.DateTimeField(auto_now=True)
	star_count = models.BigIntegerField()
	solar_mass = models.BigIntegerField()
	big_radius = models.BigIntegerField()
	anchor_mass = models.BigIntegerField()
	time_step = models.BigIntegerField()
	frame_count = models.BigIntegerField()
	approved = models.BooleanField()

	def __str__(self):
		return self.set_name
