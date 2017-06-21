# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib import admin
from models import Dataset

# Register your models here.

print "I am here"

class DatasetAdmin(admin.ModelAdmin):
	list_display = ("id", "created", "updated", "set_name", "star_count", "solar_mass", "big_radius", "anchor_mass", "time_step", "frame_count", "approved")
	search_fields = ['id','created', 'updated', 'set_name', 'star_count', 'solar_mass', 'big_radius', 'anchor_mass', 'time_step', 'frame_count' 'approved']
	list_editable = ('approved',)
admin.site.register(Dataset, DatasetAdmin)
