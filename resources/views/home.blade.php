@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-10">
		<div class="card">
			<div class="card-header">
				{{ __('Games Log') }}
			</div>

			<div class="card-body">

				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Title</th>
							<th scope="col">Clasification</th>
							<th scope="col">Console</th>
							<th scope="col">Price</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($games as $game)
						<tr>
							<th scope="col">{{ $game->id }}</th>
							<th scope="col">
								<a href="{{ route('games.show',$game) }}">
									{{ $game->title }}
								</a>
							</th>
							<th scope="col">{{ $game->clasification }}</th>
							<th scope="col">{{ $game->console }}</th>
							<th scope="col">${{ $game->price }}</th>
							<th scope="col" style="display:flex;">
								<form method="POST" action="{{ route('games.destroy',$game) }}">
									@csrf @method('DELETE')
									<button class='btn-danger'>x</button>
								</form>
								<form method="GET" action="{{ route('games.edit',$game) }}">
									@csrf
									<button class="btn-warning">E</button>
								</form>
							</th>
						</tr>
						@empty
					</tbody>
				</table>
				<p class="alert"> No games :c </p>
				@endforelse
				</tbody>
				</table>
				<a href="{{ route('games.create') }}" class="btn btn-primary">+</a>
			</div>
		</div>
	</div>
</div>
@endsection
