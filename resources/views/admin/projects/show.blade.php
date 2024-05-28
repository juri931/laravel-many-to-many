@extends('layouts.admin')

@section('content')
    <h2>{{ $project->name }}</h2>

    <small class="mt-4 d-block">Categoria: {{ $project->category }}</small>

    <small class="d-block">Creato: {{ $project->created }}</small>
    <small class="d-block">Ultimo aggiornamento: {{ $project->updated_at }}</small>
    <small>
        <ul>
            Tecnologie:
            @foreach ($project->technologies as $technology)
                <li>{{ $technology->name }}</li>
            @endforeach

        </ul>
    </small>


    <img src="{{ $project->image }}" alt="{{ $project->name }}.jpg">

    <p class="my-5">{{ $project->description }}</p>
@endsection
