<div class="mb-3">
	<label for="titleTextinput" class="form-label">{{ __('Title') }}</label>
	<input type="text" class="form-control" id="titleTextinput" placeholder="Game" value="{{ old('title',$game->title) }}" name='title'>
</div>
<div class="mb-3">
	<label for="clasification" class="form-label">{{ __('Clasification') }}</label>
	<select class="form-select" id="clasification" aria-label="Default select example" name='clasification'>
		<option {{ $game->clasification == 'E' ? 'selected':'' }} value="E">E</option>
		<option {{ $game->clasification == 'E+10' ? 'selected':'' }} alue="E+10">E+10</option>
		<option {{ $game->clasification == 'T' ? 'selected':'' }} alue="T">T</option>
		<option {{ $game->clasification == 'M' ? 'selected':'' }} alue="M">M</option>
		<option {{ $game->clasification == 'A' ? 'selected':'' }} alue="A">A</option>
	</select>
</div>

<div class="mb-3">
	<label for="console" class="form-label">{{ __('Console') }}</label>
	<select class="form-select" id="console" aria-label="Default select example" name='console'>
		<option {{ $game->console == "Xbox One" ? 'selected':'' }} value="Xbox One">Xbox One</option>
		<option {{ $game->console == "Xbox Two" ? 'selected':'' }} value="Xbox Two">Xbox two</option>
		<option {{ $game->console == "Play 4" ? 'selected':'' }} value="Play 4">Play 4</option>
		<option {{ $game->console == "Play 4-2" ? 'selected':'' }} value="Play 4-2">Play 4-2</option>
		<option {{ $game->console == "PC Master Race" ? 'selected':'' }} value="PC Master Race">PC Master Race</option>
	</select>
</div>

<div class="mb-3">
	<label for="cost" class="form-label">{{ __('Cost') }}</label>
	<input type="text" class="form-control" id="cost" placeholder="0.00" value="{{ old('cost',$game->cost) }}" name='cost'>
</div>
