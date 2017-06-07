# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib import admin
from models import Dataset

# Register your models here.

class DatasetAdmin(admin.ModelAdmin):
	list_display = ("id", "created", "updated", "first_name", "last_name")
	search_fields = ['id','created', 'updated', 'first_name', 'last_name']

admin.site.register(Dataset, DatasetAdmin)
