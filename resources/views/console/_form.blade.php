<div class="mb-3">
	<label for="titleTextinput" class="form-label">{{ __('Name') }}</label>
	<input type="text" class="form-control" id="titleTextinput" placeholder="Name of Console" value="{{ old('name',$console->name) }}" name='name'>
</div>

<div class="mb-3">
	<label for="titleTextinput" class="form-label">{{ __('Who makes it?') }}</label>
	<input type="text" class="form-control" id="titleTextinput" placeholder="Brand" value="{{ old('brand',$console->brand) }}" name='brand'>
</div>
