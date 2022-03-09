@extends('layouts.app')

@section('title','games')

@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="card-tilte">{{ $console->name }}</h1>
        <div class="d-flex flex-row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5>{{ __('Brand') }}</h5>
                    <p class="card-text">{{ $console->brand }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5>Actions</h5>
                            <div class="d-flex flex-row">
                                    <form method="POST" action="{{ route('console.destroy',$console) }}">
                                            @csrf @method('DELETE')
                                            <button class='btn-danger'>x</button>
                                    </form>
                                    <form method="GET" action="{{ route('console.edit',$console) }}" >
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
