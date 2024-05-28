@extends('layouts.admin')

@section('content')
    <h1>Elenco Tipologie</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tipologia</th>
                <th scope="col">Progetti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($type as $type)
                <tr>
                    <td class="w-25">{{ $type->name }}</td>
                    <td>
                        <ul class="list-group">
                            @foreach ($type->projects as $project)
                                <li class="list-group-item">
                                    <a href="{{ route('admin.projects.show', $project) }}">
                                        {{ $project->id }} - {{ $project->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
