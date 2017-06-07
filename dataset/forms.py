from django.forms import ModelForm
from .models import Dataset

# Notes:
# 1.11 topics forms
# / Model Form

class DatasetForm(ModelForm):
	#first_name = forms.CharField(label="First Name", max_length=255)
	#last_name = forms.CharField(label="Last Name", max_length=255)
	class Meta:
		model = Dataset
		fields = ['first_name', 'last_name']
