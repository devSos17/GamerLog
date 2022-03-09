@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-10">
		<div class="card">
			<div class="card-header">
				{{ __('Games Log-Consoles') }}
			</div>

			<div class="card-body">

				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Brand</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($consoles as $console)
						<tr>
							<th scope="col">{{ $console->id }}</th>
							<th scope="col">
								<a href="{{ route('console.show',$console) }}">
									{{ $console->name }}
								</a>
							</th>
							<th scope="col">{{ $console->brand }}</th>
							<th scope="col" style="display:flex;">
								<form method="POST" action="{{ route('console.destroy',$console) }}">
									@csrf @method('DELETE')
									<button class='btn-danger'>x</button>
								</form>
								<form method="GET" action="{{ route('console.edit',$console) }}">
									@csrf
									<button class="btn-warning">E</button>
								</form>
							</th>
						</tr>
						@empty
					</tbody>
				</table>
				<p class="alert"> No consoles :c </p>
				@endforelse
				</tbody>
				</table>
				<a href="{{ route('console.create') }}" class="btn btn-primary">+</a>
			</div>
		</div>
	</div>
</div>
@endsection
