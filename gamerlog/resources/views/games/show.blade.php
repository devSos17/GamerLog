@extends('layouts.app')

@section('title','games')

@section('content')

	<div class="card">
		<div class="card-body">
			<h1 class="card-tilte">{{ $game->title }}</h1>
			{{-- <h2>__{{ 'Description' }}</h2> --}}
			{{-- <p class="card-text">{{ $game->description }}</p> --}}
			<div class="d-flex flex-row justify-content-center">
				<div class="card">
					<div class="card-body">
						<h5>{{ 'Clasification' }}</h5>
						<p class="card-text">{{ $game->clasification }}</p>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5>{{ 'Console' }}</h5>
						<p class="card-text">{{ $game->console }}</p>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5>{{ 'Price' }}</h5>
						<p class="card-text">{{ $game->price }}</p>
					</div>
				</div>
				<div class="card">
				    <div class="card-body">
				        <h5>Actions</h5>
								<div class="d-flex flex-row">
										<form method="POST" action="{{ route('games.destroy',$game) }}">
												@csrf @method('DELETE')
												<button class='btn-danger'>x</button>
										</form>
										<form method="GET" action="{{ route('games.edit',$game) }}" >
												@csrf
												<button class="btn-warning">E</button>
										</form>
								</div>
						</div>
				</div>
			</div>
		</div>
	</div>

@endsection
