@extends('layouts.admin')

@section('content')
    <h2>{{ $project->name }}</h2>

    <div class="top-container d-flex justify-content-around">
        <div class="d-flex flex-column">
            <small class="d-block">Categoria: {{ $project->category }}</small>
            <small class="d-block">Creato: {{ $project->created }}</small>
            <small class="d-block">Ultimo aggiornamento: {{ $project->updated_at }}</small>
        </div>

        <div class="d-flex">
            <small>
                <ul>
                    Tecnologie utilizzate:
                    @foreach ($project->technologies as $technology)
                        <li class="list-unstyled">{{ $technology->name }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
    </div>


    <img src="{{ $project->image }}" alt="{{ $project->name }}.jpg">

    <p class="my-5">{{ $project->description }}</p>
@endsection
