@extends('layouts.app')

@section('title','New Game')

@section('content')

	<div class="card">
		<div class="card-body">
			<h2 class="card-title center">New Game</h2>
			<form action="{{ route('games.store') }}" method="POST">
				@csrf
				@include('games._form')
				<button type="submit" class="btn btn-success">Create</button>
			</form>
				
			</div>
		</div>
	</div>

@endsection
