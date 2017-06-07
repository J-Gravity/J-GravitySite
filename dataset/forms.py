from django.forms import ModelForm
from .models import Dataset

# Notes:
# 1.11 topics forms
# / Model Form

class DatasetForm(ModelForm):

	class Meta:
		model = Dataset
		fields = ['set_name', 'star_count', 'solar_mass',
		'big_radius', 'anchor_mass', 'time_step', 'frame_count']
