# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render
from .forms import DatasetForm
from .models import Dataset

# Create your views here.
def index(request):
	return render(request, "index.html")

def form(request):
	if request.method == 'POST':
		form = DatasetForm(request.POST)
		if form.is_valid():
			form.save()
			# It was valid, do something.
			# forms / modelforms
			# data = Dataset.objects.create

	else:
		form = DatasetForm()

	return render(request, "form.html", {'form': form})

#def submit(request):

