@extends('layouts.app')

@section('title','Edit')

@section('content')

	<div class="card">
		<div class="card-body">
			<h2 class="card-title center">Edit</h2>
			<form action="{{ route('games.update',$game) }}" method="POST">
				@csrf @method('PUT')
				@include('games._form')
				<button type="submit" class="btn btn-warning">Update</button>
			</form>
			</div>
		</div>
	</div>
@endsection
