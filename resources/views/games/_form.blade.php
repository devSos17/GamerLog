<div class="mb-3">
	<label for="titleTextinput" class="form-label">{{ __('Title') }}</label>
	<input type="text" class="form-control" id="titleTextinput" placeholder="Game" value="{{ old('title',$game->title) }}" name='title'>
</div>

<div class="mb-3">
  <label for="image" class="form-label">Add an image</label>
  <input class="form-control" type="file" id="image" name='image'>
</div>

<div class="mb-3">
	<label for="clasification" class="form-label">{{ __('Clasification') }}</label>
	<select class="form-select" id="clasification" name='clasification'>
		<option {{ $game->clasification == 'E' ? 'selected':'' }} value="E">E</option>
		<option {{ $game->clasification == 'E+10' ? 'selected':'' }} value="E+10">E+10</option>
		<option {{ $game->clasification == 'T' ? 'selected':'' }} value="T">T</option>
		<option {{ $game->clasification == 'M' ? 'selected':'' }} value="M">M</option>
		<option {{ $game->clasification == 'A' ? 'selected':'' }} value="A">A</option>
	</select>
</div>

<div class="mb-3">
	<label for="game_console_id" class="form-label">{{ __('Console') }}</label>
	<select class="form-select" id="game_console_id" name='game_console_id'>
        <option value="">Select.</option>
        @foreach ($consoles as $id => $name)
            <option
                {{ $game->game_console_id == old('game_console_id',$id) ? 'selected':'' }}
                value="{{ $id }}">
                {{ $name }}
            </option>
        @endforeach
	</select>
</div>

<div class="mb-3">
	<label for="cost" class="form-label">{{ __('Cost') }}</label>
	<input type="text" class="form-control" id="cost" placeholder="0.00" value="{{ old('cost',$game->cost) }}" name='cost'>
</div>
